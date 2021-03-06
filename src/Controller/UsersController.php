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
        $this->paginate = [
            'contain' => ['PhoneNumbers'],
            'conditions' => ['Users.is_deleted' => 0]
        ];
        $phones = TableRegistry::get('PhoneNumbers')->find('all')->where(['phone_type' => 0])->orWhere(['phone_type' => 1])->orWhere(['phone_type' => 2])->andWhere(['entity_type' => 3]);

        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');
        $can_add = ($users_model->isAdmin($session_user) || $users_model->isCore($session_user));
        $this->set('can_add', $can_add);

        if (!empty($this->request->query['mobile-search'])) {
            $this->paginate['conditions']['first_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if (!empty($this->request->query)) {

            if(!empty($this->request->query['phone'])){
                $search_phones = $this->Contacts->filterPhones($this->request->query['phone']);
                unset($this->request->query['phone']);
            }

            foreach($this->request->query as $field => $query) {
                if ($field == 'page'){
                    continue;
                }
                if(($field == 'is_deleted') && $query != ''){
                    $this->paginate['conditions']['Users.'.$field] = (int)$query;
                }else if ($field === 'cat_count' && ($query === 0 || $query != '')){
                    $this->paginate['conditions'][$field] = $query;
                }else if($field == 'do_not_adopt' && $query != ''){
                    $this->paginate['conditions'][$field] = $query;
                }else if (!empty($query)) {
                    $this->paginate['conditions'][$field.' LIKE'] = '%'.$query.'%';
                }
            }

            if(!empty($search_phones)){
                $this->paginate['conditions']['contacts.id IN'] = $search_phones;
            }

            $this->request->data = $this->request->query;
        }

        //$query = $this->Users->find()->where(['is_deleted'=>0]);
        //$users = $this->paginate($query);
        $users = $this->paginate($this->Users);

        $this->set(compact('users','phones'));
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

        $session_user = $this->request->session()->read('Auth.User');

        $can_delete = $this->Users->isAdmin($session_user);
        $can_edit = (($can_delete || $this->Users->isCore($session_user)) || $session_user['id'] == $id);

        $user = $this->Users->get($id, [
            'contain' => ['UsersAdoptionEvents', 'PhoneNumbers']
        ]);
        $phones = TableRegistry::get('PhoneNumbers')->find()->where(['entity_id' => $id])->where(['entity_type' => 3]);
        
        $adopter_profile = [];
        if (!empty($user->adopter_id)) {
            $adopter_profile = TableRegistry::get('Adopters')->get($user->adopter_id);
        }

        $foster_profile = [];
        if (!empty($user->foster_id)) {
            $foster_profile = TableRegistry::get('Fosters')->get($user->foster_id);
        }

         $filesDB = TableRegistry::get('Files');

         // get photos and count
        $photos = $filesDB->find('all', [
            'conditions' => [
                'Files.is_photo' => true,
                'Files.entity_type' => $this->Users->getEntityTypeId(),
                'Files.entity_id' => $user->id,
                'Files.is_deleted' => false
                ],
            'order' => ['Files.created'=>'DESC']]);
        $photosCountTotal = $photos->count();

        // for form on page
        $uploaded_photo = null;

        if($this->request->is('post')) {

            //uploading a file
            if(!empty($this->request->data['uploaded_photo']['name'])){

                // get file ext
                // note, assuming no filenames with periods other than for extension
                // when saving original filename
                $uploadedFileName = $this->request->data['uploaded_photo']['name'];
                $nameArray = explode('.', $uploadedFileName);
                $fileExtension = array_pop($nameArray);

                // get other vars to upload photo
                $tempLocation = $this->request->data['uploaded_photo']['tmp_name'];
                $uploadPath = 'files/users/'.$user->id;
                $entityTypeId = $this->Users->getEntityTypeId();
                $mimeType = $this->request->data['uploaded_photo']['type'];
                $fileSize = $this->request->data['uploaded_photo']['size'];

                // attempt to upload the photo with the file behavior
                $new_file_id = $this->Users->uploadPhoto($nameArray[0], $tempLocation, $fileExtension, $uploadPath, 
                    $entityTypeId, $user->id, $mimeType, $fileSize);

                if ($new_file_id > 0){

                    if(empty($user->profile_pic_file_id)) {
                        $user->profile_pic_file_id = $new_file_id;
                        $this->Users->save($user);
                    }

                     $this->Flash->success(__('Photo has been uploaded and saved successfully.'));
                        $photosCountTotal++;
                } else {
                    $this->Flash->error(__('Unable to upload photo, please try again.'));
                }

            } else {
                $this->Flash->error(__('Please choose a photo.'));
            }
        }

        $this->set(compact('user', 'foster_profile', 'adopter_profile', 'can_delete', 'can_edit', 'photos', 'photosCountTotal', 'uploaded_photo','phones'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session_user = $this->request->session()->read('Auth.User');
        if ($this->Users->isVolunteer($session_user) || $this->Users->isFoster($session_user)) {
            $this->Flash->error("You aren't allowed to do that");
            return $this->redirect(['controller'=>'users','action'=>'index']);
        }

        $user_types = [];
        if ($this->Users->isAdmin($session_user)) {
            $user_types = [
                1 => 'Admin (FULL PRIVILIGES)',
                2 => 'Core Volunteer',
                3 => 'Volunteer',
                4 => 'Foster Home'
            ];
        } else {
            $user_types = [
                3 => 'Volunteer',
                4 => 'Foster Home'
            ];
        }

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
                    ->subject("You have been invited to the Mission Meow's Mission Control!")
                    ->send('Welcome to the PAWS family! Head over to http://admin.missionmeowcats.org to set up your profile.<br/><br/>Your email: '.$data['email'].'<br/>Your password: '.$data['password']);

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

        $session_user = $this->request->session()->read('Auth.User');
        if (empty($id)) {
            $id = $session_user['id'];
        } else if ($id != $session_user['id']) {
            if (!TableRegistry::get('Users')->isAdmin($session_user)) {
                $this->Flash->error("You aren't allowed to do that.");
                return $this->redirect(['controller'=>'users','action'=>'view',$id]);
            }
        }

        $user = $this->Users->get($id, [
            'contain' => ['PhoneNumbers']
        ]);
        $phoneTable = TableRegistry::get('PhoneNumbers');
        $phone = TableRegistry::get('PhoneNumbers')->find()->where(['entity_id' => $id])->where(['entity_type' => 3]);

        $admin = ($this->request->session()->read('Auth.User.role') == 1) ? true : false;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['phones'])){
                $phones = $this->request->data['phones'];
            }

            if(!empty($phones)){
                unset($this->request->data['phones']);
            }

            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->new_user = 0;
            if ($this->Users->save($user)) {
                if(!empty($phones)){
                    for($i = 0; $i < count($phones['phone_type']); $i++) {
                        $new_phone = $phoneTable->newEntity();
                        $new_phone->entity_id = $id;
                        $new_phone->entity_type = 3;
                        $new_phone->phone_type = $phones['phone_type'][$i];
                        $new_phone->phone_num = $phones['phone_num'][$i];
                        if(!($new_phone['phone_num'] === '')){
                            $phoneTable->save($new_phone);
                        }
                    }
                }
                $this->request->session()->write('Auth.User.new_user', 0);
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller'=>'users','action' => 'view', $user->id]);
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

        $this->set(compact('user', 'user_types', 'admin','phone'));
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
        
        $session_user = $this->request->session()->read('Auth.User');
        if ($this->referer() != Router::url(['controller'=>'users','action'=>'view',$id],true) || 
                (!TableRegistry::get('Users')->isAdmin($session_user) || $session_user['id'] == $id)) {
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
