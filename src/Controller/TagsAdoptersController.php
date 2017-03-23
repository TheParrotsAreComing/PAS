<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TagsAdopters Controller
 *
 * @property \App\Model\Table\TagsAdoptersTable $TagsAdopters
 */
class TagsAdoptersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Adopters']
        ];
        $tagsAdopters = $this->paginate($this->TagsAdopters);

        $this->set(compact('tagsAdopters'));
        $this->set('_serialize', ['tagsAdopters']);
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
        $tagsAdopter = $this->TagsAdopters->get($id, [
            'contain' => ['Tags', 'Adopters']
        ]);

        $this->set('tagsAdopter', $tagsAdopter);
        $this->set('_serialize', ['tagsAdopter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tagsAdopter = $this->TagsAdopters->newEntity();
        if ($this->request->is('post')) {
            $tagsAdopter = $this->TagsAdopters->patchEntity($tagsAdopter, $this->request->data);
            if ($this->TagsAdopters->save($tagsAdopter)) {
                $this->Flash->success(__('The tags adopter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags adopter could not be saved. Please, try again.'));
        }
        $tags = $this->TagsAdopters->Tags->find('list', ['limit' => 200]);
        $adopters = $this->TagsAdopters->Adopters->find('list', ['limit' => 200]);
        $this->set(compact('tagsAdopter', 'tags', 'adopters'));
        $this->set('_serialize', ['tagsAdopter']);
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
        $tagsAdopter = $this->TagsAdopters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagsAdopter = $this->TagsAdopters->patchEntity($tagsAdopter, $this->request->data);
            if ($this->TagsAdopters->save($tagsAdopter)) {
                $this->Flash->success(__('The tags adopter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags adopter could not be saved. Please, try again.'));
        }
        $tags = $this->TagsAdopters->Tags->find('list', ['limit' => 200]);
        $adopters = $this->TagsAdopters->Adopters->find('list', ['limit' => 200]);
        $this->set(compact('tagsAdopter', 'tags', 'adopters'));
        $this->set('_serialize', ['tagsAdopter']);
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
        $tagsAdopter = $this->TagsAdopters->get($id);
        if ($this->TagsAdopters->delete($tagsAdopter)) {
            $this->Flash->success(__('The tags adopter has been deleted.'));
        } else {
            $this->Flash->error(__('The tags adopter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
