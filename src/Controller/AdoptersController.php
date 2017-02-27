<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Adopters Controller
 *
 * @property \App\Model\Table\AdoptersTable $Adopters
 */
class AdoptersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $adopters = $this->paginate($this->Adopters);

        $cat_history_db = TableRegistry::get('CatHistories');
        $cat_db = TableRegistry::get('Cats');

        $adopter_cats = [];
        foreach ($adopters as $adopter) {
          $adopter_cats[$adopter['id']] = [];
          $cats = $cat_history_db->find('all', ['conditions'=>['adopter_id'=>$adopter['id'], 'end_date IS NULL']])->toArray();
          foreach ($cats as $i => $cat) {
            $adopter_cats[$adopter['id']][$i] = $cat_db->find('all', ['conditions'=>['id'=>$cat['cat_id']]])->first();
          }
        }

        $this->set(compact('adopters', 'adopter_cats'));
        $this->set('_serialize', ['adopters']);
    }

    /**
     * View method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adopter = $this->Adopters->get($id, [
            'contain' => ['Tags', 'CatHistories', 'Cats']
        ]);

        $this->set('adopter', $adopter);
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adopter = $this->Adopters->newEntity();
        if ($this->request->is('post')) {
            $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
            $adopter['is_deleted'] = 0;
			$adopter['cat_count'] = 0;
			if ($this->Adopters->save($adopter)) {
                $this->Flash->success(__('The adopter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adopter could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Adopters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('adopter', 'tags'));
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adopter = $this->Adopters->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
            if ($this->Adopters->save($adopter)) {
                $this->Flash->success(__('The adopter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adopter could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Adopters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('adopter', 'tags'));
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adopter = $this->Adopters->get($id);
        if ($this->Adopters->delete($adopter)) {
            $this->Flash->success(__('The adopter has been deleted.'));
        } else {
            $this->Flash->error(__('The adopter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
