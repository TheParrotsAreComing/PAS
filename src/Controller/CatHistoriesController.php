<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CatHistories Controller
 *
 * @property \App\Model\Table\CatHistoriesTable $CatHistories
 */
class CatHistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($cat_id)
    {
        $this->paginate = [
            'contain' => ['Cats', 'Adopters', 'Fosters'],
			'conditions'=>['cat_id'=>$cat_id],
			'order'=>['start_date'=>'DESC']
        ];
        $catHistories = $this->paginate($this->CatHistories);

        $this->set(compact('catHistories'));
        $this->set('_serialize', ['catHistories']);
    }

    /**
     * View method
     *
     * @param string|null $id Cat History id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catHistory = $this->CatHistories->get($id, [
            'contain' => ['Cats', 'Adopters', 'Fosters']
        ]);

        $this->set('catHistory', $catHistory);
        $this->set('_serialize', ['catHistory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catHistory = $this->CatHistories->newEntity();
        if ($this->request->is('post')) {
            $catHistory = $this->CatHistories->patchEntity($catHistory, $this->request->data);
            if ($this->CatHistories->save($catHistory)) {
                $this->Flash->success(__('The cat history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat history could not be saved. Please, try again.'));
        }
        $cats = $this->CatHistories->Cats->find('list', ['limit' => 200]);
        $adopters = $this->CatHistories->Adopters->find('list', ['limit' => 200]);
        $fosters = $this->CatHistories->Fosters->find('list', ['limit' => 200]);
        $this->set(compact('catHistory', 'cats', 'adopters', 'fosters'));
        $this->set('_serialize', ['catHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat History id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catHistory = $this->CatHistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catHistory = $this->CatHistories->patchEntity($catHistory, $this->request->data);
            if ($this->CatHistories->save($catHistory)) {
                $this->Flash->success(__('The cat history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat history could not be saved. Please, try again.'));
        }
        $cats = $this->CatHistories->Cats->find('list', ['limit' => 200]);
        $adopters = $this->CatHistories->Adopters->find('list', ['limit' => 200]);
        $fosters = $this->CatHistories->Fosters->find('list', ['limit' => 200]);
        $this->set(compact('catHistory', 'cats', 'adopters', 'fosters'));
        $this->set('_serialize', ['catHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catHistory = $this->CatHistories->get($id);
        if ($this->CatHistories->delete($catHistory)) {
            $this->Flash->success(__('The cat history has been deleted.'));
        } else {
            $this->Flash->error(__('The cat history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
