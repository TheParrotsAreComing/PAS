<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersAdoptionEvents Controller
 *
 * @property \App\Model\Table\UsersAdoptionEventsTable $UsersAdoptionEvents
 */
class UsersAdoptionEventsController extends AppController
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
        $usersAdoptionEvents = $this->paginate($this->UsersAdoptionEvents);

        $this->set(compact('usersAdoptionEvents'));
        $this->set('_serialize', ['usersAdoptionEvents']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Adoption Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersAdoptionEvent = $this->UsersAdoptionEvents->get($id, [
            'contain' => ['Users', 'AdoptionEvents']
        ]);

        $this->set('usersAdoptionEvent', $usersAdoptionEvent);
        $this->set('_serialize', ['usersAdoptionEvent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersAdoptionEvent = $this->UsersAdoptionEvents->newEntity();
        if ($this->request->is('post')) {
            $usersAdoptionEvent = $this->UsersAdoptionEvents->patchEntity($usersAdoptionEvent, $this->request->data);
            if ($this->UsersAdoptionEvents->save($usersAdoptionEvent)) {
                $this->Flash->success(__('The users adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users adoption event could not be saved. Please, try again.'));
        }
        $users = $this->UsersAdoptionEvents->Users->find('list', ['limit' => 200]);
        $adoptionEvents = $this->UsersAdoptionEvents->AdoptionEvents->find('list', ['limit' => 200]);
        $this->set(compact('usersAdoptionEvent', 'users', 'adoptionEvents'));
        $this->set('_serialize', ['usersAdoptionEvent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Adoption Event id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersAdoptionEvent = $this->UsersAdoptionEvents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersAdoptionEvent = $this->UsersAdoptionEvents->patchEntity($usersAdoptionEvent, $this->request->data);
            if ($this->UsersAdoptionEvents->save($usersAdoptionEvent)) {
                $this->Flash->success(__('The users adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users adoption event could not be saved. Please, try again.'));
        }
        $users = $this->UsersAdoptionEvents->Users->find('list', ['limit' => 200]);
        $adoptionEvents = $this->UsersAdoptionEvents->AdoptionEvents->find('list', ['limit' => 200]);
        $this->set(compact('usersAdoptionEvent', 'users', 'adoptionEvents'));
        $this->set('_serialize', ['usersAdoptionEvent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Adoption Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersAdoptionEvent = $this->UsersAdoptionEvents->get($id);
        if ($this->UsersAdoptionEvents->delete($usersAdoptionEvent)) {
            $this->Flash->success(__('The users adoption event has been deleted.'));
        } else {
            $this->Flash->error(__('The users adoption event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
