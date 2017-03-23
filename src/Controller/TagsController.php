<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 */
class TagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tags = $this->paginate($this->Tags);

        $this->set(compact('tags'));
        $this->set('_serialize', ['tags']);
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Adopters', 'Cats', 'Fosters']
        ]);

        $this->set('tag', $tag);
        $this->set('_serialize', ['tag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $colors = [
            '2485ff' => 'Blue',
            'ec4141' => 'Red',
            'ffa722' => 'Yellow',
            '3ed84a' => 'Green'
        ];

        $tag = $this->Tags->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['type_bit'] = 0;
            $this->request->data['type_bit'] += $this->request->data['for_fosters'];
            $this->request->data['type_bit'] += $this->request->data['for_adopters'] * 10;
            $this->request->data['type_bit'] += $this->request->data['for_cats'] * 100;
            $this->request->data['is_deleted'] = false;

            $tag = $this->Tags->patchEntity($tag, $this->request->data);
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $adopters = $this->Tags->Adopters->find('list', ['limit' => 200]);
        $cats = $this->Tags->Cats->find('list', ['limit' => 200]);
        $fosters = $this->Tags->Fosters->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'adopters', 'cats', 'fosters', 'colors'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colors = [
            '2485ff' => 'Blue',
            'ec4141' => 'Red',
            'ffa722' => 'Yellow',
            '3ed84a' => 'Green'
        ];

        $tag = $this->Tags->get($id, [
            'contain' => ['Adopters', 'Cats', 'Fosters']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->request->data['type_bit'] = 0;
            $this->request->data['type_bit'] += $this->request->data['for_fosters'];
            $this->request->data['type_bit'] += $this->request->data['for_adopters'] * 10;
            $this->request->data['type_bit'] += $this->request->data['for_cats'] * 100;

            $tag = $this->Tags->patchEntity($tag, $this->request->data);
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $adopters = $this->Tags->Adopters->find('list', ['limit' => 200]);
        $cats = $this->Tags->Cats->find('list', ['limit' => 200]);
        $fosters = $this->Tags->Fosters->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'adopters', 'cats', 'fosters', 'colors'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('The tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
