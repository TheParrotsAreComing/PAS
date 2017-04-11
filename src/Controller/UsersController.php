<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login','logout']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        if (!empty($this->request->query['mobile-search'])) {
            $this->paginate['conditions']['first_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if (!empty($this->request->query)) {
            foreach($this->request->query as $field => $query) {
                if ($field === 'cat_count' && ($query === 0 || $query != '')){
                    $this->paginate['conditions'][$field] = $query;
                }else if($field == 'do_not_adopt' && $query != ''){
                    $this->paginate['conditions'][$field] = $query;
                }else if (!empty($query)) {
                    $this->paginate['conditions'][$field.' LIKE'] = '%'.$query.'%';
                }
            }
            $this->request->data = $this->request->query;
        }

        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UsersEvents']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user_types = [
            1 => 'Admin (FULL PRIVILIGES)',
            2 => 'Core Volunteer',
            3 => 'Volunteer',
            4 => 'Foster Home'
        ];

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['password'] = $this->Users->generatePassword();
            $data['first_name'] = "First";
            $data['last_name'] = "Last";
            $data['phone'] = "0000000000";
            $data['address'] = "Address";
            $data['new_user'] = 1;
            $data['need_new_password'] = 1;
            $data['is_deleted'] = 0;
            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                $email = new Email('auto');
                $email->to('ericsbollinger@gmail.com')
                    ->subject("You have been invited to the PAWS Administrative System!")
                    ->send('Welcome to the PAWS family! Head over to https://localhost/PAWS_Admin to set up your profile.<br/><br/>Your email: '.$data['email'].'<br/>Your password: '.$data['password']);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'user_types'));
        $this->set('_serialize', ['user']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Invalid email or password, try again');
        }
    }

    public function logout() {
        $this->Flash->success('You are meow logged out.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->new_user = 0;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        } else {
            if ($user->new_user) {
                $user->first_name = "";
                $user->last_name = "";
                $user->phone = "";
                $user->address = "";
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function changePassword() {
        $user = $this->Users->get($this->request->session()->read('Auth.User.id'));
        if ($this->request->is('POST')) {
            $this->request->data['email'] = $user->email;
            if ($this->Auth->identify()) {
                if ($this->request->data['new_password'] === $this->request->data['confirm_new_password']) {
                    $user->password = $this->request->data['new_password'];
                    $this->Users->save($user);
                    $this->Flash->success('Your password has been changed!');
                    $this->redirect(['controller'=>'cats','action'=>'index']);
                } else {
                    $this->Flash->error('Passwords do not match. Please try again.');
                }
            } else {
                $this->Flash->error('Incorrect password. Please try again.');
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
