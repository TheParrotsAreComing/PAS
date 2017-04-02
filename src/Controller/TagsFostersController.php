<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TagsAdopters Controller
 *
 * @property \App\Model\Table\TagsAdoptersTable $TagsAdopters
 */
class TagsFostersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Fosters']
        ];
        $tagsFosters = $this->paginate($this->TagsFosters);

        $this->set(compact('tagsFosters'));
        $this->set('_serialize', ['tagsFosters']);
    }

    /**
     * View method
     *
     * @param string|null $id Tags Adopter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tagsFoster = $this->TagsFosters->get($id, [
            'contain' => ['Tags', 'Fosters']
        ]);

        $this->set('tagsFoster', $tagsFoster);
        $this->set('_serialize', ['tagsFoster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tagsFoster = $this->TagsFosters->newEntity();
        if ($this->request->is('post')) {
            $tagsFoster = $this->TagsFosters->patchEntity($tagsFoster, $this->request->data);
            if ($this->TagsFosters->save($tagsFoster)) {
                $this->Flash->success(__('The tags foster has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags foster could not be saved. Please, try again.'));
        }
        $tags = $this->TagsFosters->Tags->find('list', ['limit' => 200]);
        $fosters = $this->TagsFosters->Fosters->find('list', ['limit' => 200]);
        $this->set(compact('tagsFoster', 'tags', 'fosters'));
        $this->set('_serialize', ['tagsFoster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tags Adopter id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tagsFoster = $this->TagsFosters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagsFoster = $this->TagsFosters->patchEntity($tagsFoster, $this->request->data);
            if ($this->TagsFosters->save($tagsFoster)) {
                $this->Flash->success(__('The tags foster has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags foster could not be saved. Please, try again.'));
        }
        $tags = $this->TagsFosters->Tags->find('list', ['limit' => 200]);
        $fosters = $this->TagsFosters->Fosters->find('list', ['limit' => 200]);
        $this->set(compact('tagsFoster', 'tags', 'fosters'));
        $this->set('_serialize', ['tagsFoster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tags Adopter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tagsFoster = $this->TagsFosters->get($id);
        if ($this->TagsFosters->delete($tagsFoster)) {
            $this->Flash->success(__('The tags foster has been deleted.'));
        } else {
            $this->Flash->error(__('The tags foster could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
