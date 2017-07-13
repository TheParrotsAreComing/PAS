<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * AdoptionEvents Controller
 *
 * @property \App\Model\Table\AdoptionEventsTable $AdoptionEvents
 */
class AdoptionEventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');
        $can_add = false;
        if ($users_model->isFoster($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        } else if (!$users_model->isVolunteer($session_user)) {
            $can_add = true;
        }

        //sort
        $this->paginate = [
            'contain' => ['Cats', 'Users', 'Cats.Breeds', 'Cats.Files', 'Users.Files'],
            'conditions' => ['AdoptionEvents.is_deleted' => 0]
        ];

        if(!empty($this->request->query['mobile-search'])){
            $this->paginate['conditions']['event_date LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if(!empty($this->request->query)){


            foreach($this->request->query as $field => $query){
                // check the flags first
                if(is_array($query) || $field == 'page'){
                    continue;
                }
                if(($field == 'is_deleted') && $query != ''){
                    $this->paginate['conditions']['AdoptionEvents.'.$field] = (int)$query;
                }else if($field == 'event_date') {
                    if(!empty($query)){
                        $this->paginate['conditions']['AdoptionEvents.'.$field] = date('Y-m-d',strtotime($query));
                    }
                } else if (!empty($query)) {
                    $this->paginate['conditions']['AdoptionEvents.'.$field.' LIKE'] = '%'.$query.'%';
                }
            }

            $this->request->data = $this->request->query;
        }
        //$adoptionEvents = $this->paginate($this->AdoptionEvents);
        /*$adoptionEvents = $this->AdoptionEvents->find('all', [
            'contain' => ['Cats', 'Users', 'Cats.Breeds', 'Cats.Files', 'Users.Files'],
            'conditions' => ['AdoptionEvents.is_deleted'=> 0]]);*/
        //$this->paginate($this->AdoptionEvents);
        $adoptionEvents = $this->paginate($this->AdoptionEvents);
        $this->set(compact('adoptionEvents', 'can_add'));
        $this->set('_serialize', ['adoptionEvents']);

        $filesDB = TableRegistry::get('Files');

        foreach($adoptionEvents as $adoptionEvent) {
            if (!empty($adoptionEvent->users)) {
                foreach($adoptionEvent->users as $user) {
                    if($user->profile_pic_file_id > 0){
                        $user->profile_pic = $filesDB->get($user->profile_pic_file_id);
                    } else {
                        $user->profile_pic = null;
                    }
                }
            }

            if (!empty($adoptionEvent->cats)) {
                foreach($adoptionEvent->cats as $cat) {
                    if($cat->profile_pic_file_id > 0){
                        $cat->profile_pic = $filesDB->get($cat->profile_pic_file_id);
                    } else {
                        $cat->profile_pic = null;
                    }
                }
            }
        }

    }

    /**
     * View method
     *
     * @param string|null $id Adoption Event id., 'Users.Files'
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session_user = $this->request->session()->read('Auth.User');
        $user_model = TableRegistry::get('Users');

        if ($user_model->isFoster($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        }

        $adoptionEvent = $this->AdoptionEvents->get($id, [
            'contain' => ['Cats', 'Users']
        ]);

        $this->set('adoptionEvent', $adoptionEvent);
        $this->set('_serialize', ['adoptionEvent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');
        if ($users_model->isFoster($session_user) || $users_model->isVolunteer($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        }

        $eventDate = false;
        $catsDB = TableRegistry::get('Cats');
        $usersDB = TableRegistry::get('Users');
        $adoptionEvent = $this->AdoptionEvents->newEntity();
        if ($this->request->is('post')) {

            //Extract and put together event date into db format
            $eventDate = $this->request->data['event_date']['year'];
            $month = $this->request->data['event_date']['month'];
            $day = $this->request->data['event_date']['day'];
            $eventDate .= '-'.$month.'-'.$day;
            $this->request->data['event_date'] = $eventDate;

            //Initial creation, not deleted
            $this->request->data['is_deleted'] = 0;

            $adoptionEvent = $this->AdoptionEvents->patchEntity($adoptionEvent, $this->request->data);
            if ($this->AdoptionEvents->save($adoptionEvent)) {
                $this->Flash->success(__('The adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adoption event could not be saved. Please, try again.'));
        }
        $cats = $catsDB->find('all');
        $cats->where(['is_deleted' => 0, 'is_deceased' => 0]);
        $select_cats = [];
        $select_users = [];
        foreach($cats as $cat) {
            $select_cats[$cat->id] = $cat->cat_name;
        }
        $users = $usersDB->find('all');
        $users->where(['is_deleted' => 0]);
        foreach($users as $user) {
            $select_users[$user->id] = $user->first_name.' '.$user->last_name;
        }

        $this->set(compact('adoptionEvent', 'cats', 'eventDate', 'select_cats', 'select_users'));
        $this->set('_serialize', ['adoptionEvent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adoption Event id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');

        $phoneTable = TableRegistry::get('PhoneNumbers');
        if ($users_model->isFoster($session_user) || $users_model->isVolunteer($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        }

        $eventDate = false;
        $adoptionEvent = $this->AdoptionEvents->get($id, [
            'contain' => ['Cats', 'Cats.Breeds', 'Cats.Files', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adoptionEvent = $this->AdoptionEvents->patchEntity($adoptionEvent, $this->request->data);
            if ($this->AdoptionEvents->save($adoptionEvent)) {
                $this->Flash->success(__('The adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adoption event could not be saved. Please, try again.'));
        }
        $cats = $this->AdoptionEvents->Cats->find('list', ['limit' => 200]);
        $this->set(compact('adoptionEvent', 'cats'));
        $this->set('_serialize', ['adoptionEvent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adoption Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $session_user = $this->request->session()->read('Auth.User');
        if (!TableRegistry::get('Users')->isAdmin($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        }

        $adoptionEvent = $this->AdoptionEvents->get($id);
        $this->request->data['is_deleted'] = 1;
        $adoptionEvent = $this->AdoptionEvents->patchEntity($adoptionEvent, $this->request->data);
        if ($this->AdoptionEvents->save($adoptionEvent)) {
            $this->Flash->success(__('The adoption event has been deleted.'));
            return $this->redirect(['controller' => 'AdoptionEvents', 'action'=>'index']);
        } else {
            $this->Flash->error(__('The adoption event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
