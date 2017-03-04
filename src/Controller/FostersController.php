<?php
namespace App\Controller;

use App\Controller\AppController;
Use Cake\ORM\TableRegistry;

/**
 * Fosters Controller
 *
 * @property \App\Model\Table\FostersTable $Fosters
 */
class FostersController extends AppController
{

    /**
     * Index method
     * @author Eric Bollinger - 2/15/2017
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $query = $this->Fosters->find();
        $query->contain([
            'CatHistories'=>function($q) {
                return $q->where(['end_date IS NULL']);
            },
            'CatHistories.Cats']
        );
          
        $fosters = $this->paginate($query);
        $this->set(compact('fosters', 'foster_cats'));
        $this->set('_serialize', ['fosters']);
    }

    /**
     * View method
     *
     * @param string|null $id Foster id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foster = $this->Fosters->get($id, [
            'contain' => ['Tags', 'CatHistories', 'Cats']
        ]);

        $this->set('foster', $foster);
        $this->set('_serialize', ['foster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foster = $this->Fosters->newEntity();
        if ($this->request->is('post')) {
            $foster = $this->Fosters->patchEntity($foster, $this->request->data);
			$foster['is_deleted'] = 0;
            if ($this->Fosters->save($foster)) {
                $this->Flash->success(__('The foster has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The foster could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Fosters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('foster', 'tags'));
        $this->set('_serialize', ['foster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Foster id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foster = $this->Fosters->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foster = $this->Fosters->patchEntity($foster, $this->request->data);
            if ($this->Fosters->save($foster)) {
                $this->Flash->success(__('The foster has been saved.'));

                return $this->redirect(['action' => 'view', $foster->id]);
            } else {
                $this->Flash->error(__('The foster could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Fosters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('foster', 'tags'));
        $this->set('_serialize', ['foster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Foster id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $foster = $this->Fosters->get($id);
        $this->request->data['is_deleted'] = 1;
        $foster = $this->Fosters->patchEntity($foster, $this->request->data);
        if ($this->Fosters->save($foster)) {
            $this->Flash->success(__('The foster has been deleted.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The foster could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
