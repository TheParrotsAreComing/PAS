<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TagsAdopters Controller
 *
 * @property \App\Model\Table\TagsAdoptersTable $TagsAdopters
 */
class TagsCatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tags', 'Cats']
        ];
        $tagsCats = $this->paginate($this->TagsCats);

        $this->set(compact('tagsCats'));
        $this->set('_serialize', ['tagsCats']);
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
        $tagsCat = $this->TagsCats->get($id, [
            'contain' => ['Tags', 'Cats']
        ]);

        $this->set('tagsCat', $tagsCat);
        $this->set('_serialize', ['tagsCat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tagsCat = $this->TagsCats->newEntity();
        if ($this->request->is('post')) {
            $tagsCat = $this->TagsCats->patchEntity($tagsCat, $this->request->data);
            if ($this->TagsCats->save($tagsCat)) {
                $this->Flash->success(__('The tags cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags cat could not be saved. Please, try again.'));
        }
        $tags = $this->TagsCats->Tags->find('list', ['limit' => 200]);
        $cats = $this->TagsCats->Cats->find('list', ['limit' => 200]);
        $this->set(compact('tagsCat', 'tags', 'cats'));
        $this->set('_serialize', ['tagsCat']);
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
        $tagsCat = $this->TagsCats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tagsCat = $this->TagsCats->patchEntity($tagsCat, $this->request->data);
            if ($this->TagsCats->save($tagsCat)) {
                $this->Flash->success(__('The tags cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tags cat could not be saved. Please, try again.'));
        }
        $tags = $this->TagsCats->Tags->find('list', ['limit' => 200]);
        $cats = $this->TagsCats->Cats->find('list', ['limit' => 200]);
        $this->set(compact('tagsCat', 'tags', 'cats'));
        $this->set('_serialize', ['tagsCat']);
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
        $tagsCat = $this->TagsCats->get($id);
        if ($this->TagsCats->delete($tagsCat)) {
            $this->Flash->success(__('The tags Cat has been deleted.'));
        } else {
            $this->Flash->error(__('The tags Cat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
