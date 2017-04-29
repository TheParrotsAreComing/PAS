<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersEvents Controller
 *
 * @property \App\Model\Table\UsersEventsTable $UsersEvents
 */
class UsersEventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'AdoptionEvents']
        ];
        $usersEvents = $this->paginate($this->UsersEvents);

        $this->set(compact('usersEvents'));
        $this->set('_serialize', ['usersEvents']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersEvent = $this->UsersEvents->get($id, [
            'contain' => ['Users', 'AdoptionEvents']
        ]);

        $this->set('usersEvent', $usersEvent);
        $this->set('_serialize', ['usersEvent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersEvent = $this->UsersEvents->newEntity();
        if ($this->request->is('post')) {
            $usersEvent = $this->UsersEvents->patchEntity($usersEvent, $this->request->data);
            if ($this->UsersEvents->save($usersEvent)) {
                $this->Flash->success(__('The users event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users event could not be saved. Please, try again.'));
        }
        $users = $this->UsersEvents->Users->find('list', ['limit' => 200]);
        $adoptionEvents = $this->UsersEvents->AdoptionEvents->find('list', ['limit' => 200]);
        $this->set(compact('usersEvent', 'users', 'adoptionEvents'));
        $this->set('_serialize', ['usersEvent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Event id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersEvent = $this->UsersEvents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersEvent = $this->UsersEvents->patchEntity($usersEvent, $this->request->data);
            if ($this->UsersEvents->save($usersEvent)) {
                $this->Flash->success(__('The users event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users event could not be saved. Please, try again.'));
        }
        $users = $this->UsersEvents->Users->find('list', ['limit' => 200]);
        $adoptionEvents = $this->UsersEvents->AdoptionEvents->find('list', ['limit' => 200]);
        $this->set(compact('usersEvent', 'users', 'adoptionEvents'));
        $this->set('_serialize', ['usersEvent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersEvent = $this->UsersEvents->get($id);
        if ($this->UsersEvents->delete($usersEvent)) {
            $this->Flash->success(__('The users event has been deleted.'));
        } else {
            $this->Flash->error(__('The users event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
