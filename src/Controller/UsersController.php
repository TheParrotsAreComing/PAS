<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

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

        $query = $this->Users->find()->where(['is_deleted'=>0]);
        $users = $this->paginate($query);

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
        if (empty($id)) {
            $id = $this->request->session()->read('Auth.User.id');
        }

        $can_delete = ($this->request->session()->read('Auth.User.role') == 1);
        $can_modify = (($can_delete || $this->request->session()->read('Auth.User.role') == 2) || $this->request->session()->read('Auth.User.id') == $id);

        $user = $this->Users->get($id, [
            'contain' => ['UsersEvents']
        ]);
        $adopter_profile = [];
        if (!empty($user->adopter_id)) {
            $adopter_profile = TableRegistry::get('Adopters')->get($user->adopter_id);
        }

        $this->set(compact('user', 'adopter_profile', 'can_delete', 'can_modify'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->session()->read('Auth.User.role') != 1) {
            $this->Flash->error("You aren't allowed to do that");
            return $this->redirect(['controller'=>'users','action'=>'index']);
        }

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
                $email->to($user->email)
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
            if ($user && !$user['is_deleted']) {
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

        if (empty($id)) {
            $id = $this->request->session()->read('Auth.User.id');
        } else if ($id != $this->request->session()->read('Auth.User.id')) {
            if ($this->request->session()->read('Auth.User.role') != 1) {
                $this->Flash->error("You aren't allowed to do that.");
                return $this->redirect(['controller'=>'users','action'=>'view',$id]);
            }
        }

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $admin = ($this->request->session()->read('Auth.User.role') == 1) ? true : false;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->new_user = 0;
            if ($this->Users->save($user)) {
                $this->request->session()->write('Auth.User.new_user', 0);
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

        $user_types = array_flip(Configure::read('Roles'));
        $user_types[1] = "Admin **FULL PRIVILEGES**";

        $this->set(compact('user', 'user_types', 'admin'));
        $this->set('_serialize', ['user']);
    }

    public function changePassword() {
        $user = $this->Users->get($this->request->session()->read('Auth.User.id'));
        if ($this->request->is('POST')) {
            $this->request->data['email'] = $user->email;
            if ($this->Auth->identify()) {
                if ($this->request->data['new_password'] === $this->request->data['confirm_new_password']) {
                    $user->password = $this->request->data['new_password'];
                    $user->need_new_password = 0;
                    $this->Users->save($user);
                    $this->request->session()->write('Auth.User.need_new_password', 0);
                    $this->Flash->success('Your password has been changed!');
                    $this->redirect(['controller'=>'users','action'=>'edit']);
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
        // if this function wasn't navigated to properly, or if someone other than an admin is trying to delete a 
        // user other than himself, don't allow the deletion to carry through 
        
        if ($this->referer() != Router::url(['controller'=>'users','action'=>'view',$id],true) || 
                ($this->request->session()->read('Auth.User.role') != 1 && $this->request->session()->read('Auth.User.id') != $id)) {
            $this->Flash->error("You aren't allowed to do that");
            return $this->redirect(['controller'=>'users','action'=>'view',$id]);
        }

        //$this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->request->data['is_deleted'] = 1;
        $user = $this->Users->patchEntity($user, $this->request->data);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The volunteer has been deleted.'));
        } else {
            $this->Flash->error(__('The volunteer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
