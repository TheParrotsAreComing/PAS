<?php
namespace App\Controller;

use App\Controller\AppController;
Use Cake\ORM\TableRegistry;

/**
 * Fosters Controller
 *
 * @property \App\Model\Table\FostersTable $Fosters
 */
class FostersController extends AppController
{

    /**
     * Index method
     * @author Eric Bollinger - 2/15/2017
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


        $this->paginate = [
            'contain' => [ 
            'PhoneNumbers',
            'CatHistories'=>function($q){
                return $q->where(['end_date IS NULL']);
            }, 
            'CatHistories.Cats', 'CatHistories.Cats.Breeds'],
            'conditions' => ['Fosters.is_deleted' => 0]
        ];

        $phones = TableRegistry::get('PhoneNumbers')->find('all')->where(['phone_type' => 0])->orWhere(['phone_type' => 1])->orWhere(['phone_type' => 2])->andWhere(['entity_type' => 0]);

        $filesDB = TableRegistry::get('Files');

        $foster_tags = TableRegistry::get('Tags')->find('list', ['keyField'=>'id','valueField'=>'label'])->where('type_bit & 1')->toArray();

        //debug($foster_phones); die;
        if(!empty($this->request->query['mobile-search'])){
            $this->paginate['conditions']['first_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if(!empty($this->request->query)){

            if(!empty($this->request->query['tag'])){
                $tagged_fosters = $this->Fosters->buildFilterArray($this->request->query['tag']);
                unset($this->request->query['tag']);
            }
            if(!empty($this->request->query['phone'])){
                $search_phones = $this->Fosters->filterPhones($this->request->query['phone']);
                unset($this->request->query['phone']);
            }
            
            //debug($foster_phones); die;
            foreach($this->request->query as $field => $query){
                if ($field == 'page'){
                    continue;
                }
                if(($field == 'is_deleted') && $query != ''){
                    $this->paginate['conditions']['Fosters.'.$field] = (int)$query;
                }else if ($field == 'rating' && !empty($query)){
                    if(preg_match('/rating/',$field)){
                        $this->paginate['conditions'][$field] = $query;
                    }
                }else if (!empty($query)) {
                    $this->paginate['conditions'][$field.' LIKE'] = '%'.$query.'%';
                }
            }

            if(!empty($tagged_fosters)){
                $this->paginate['conditions']['fosters.id IN'] = $tagged_fosters;
            }
            if(!empty($search_phones)){
                $this->paginate['conditions']['fosters.id IN'] = $search_phones;
            }

            $this->request->data = $this->request->query;
        }
        $rating = [0,1,2,3,4,5,6,7,8,9,10];
        $fosters = $this->paginate($this->Fosters);

        foreach($fosters as $foster) {
            if($foster->profile_pic_file_id > 0){
                $foster->profile_pic = $filesDB->get($foster->profile_pic_file_id);

            } else {
                $foster->profile_pic = null;
            }

            // get cat profile pics
            if(!empty($foster->cat_histories)) {
                foreach($foster->cat_histories as $cat_hist){
                    if($cat_hist->cat->profile_pic_file_id > 0){
                        $cat_hist->cat->profile_pic = $filesDB->get($cat_hist->cat->profile_pic_file_id);
                    } else {
                        $cat_hist->cat->profile_pic = null;
                    }
                }
            }
        }

        $this->set(compact('fosters', 'foster_cats', 'rating','foster_tags', 'phones', 'entity_type', 'can_add'));
        $this->set('_serialize', ['fosters']);
    }

    /**
     * View method
     *
     * @param string|null $id Foster id.
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

        $can_delete = ($user_model->isAdmin($session_user));
        $can_edit = ($can_delete || $user_model->isCore($session_user));

        $cat_breeds = TableRegistry::get('Breeds')->find('all');

        $phones = TableRegistry::get('PhoneNumbers')->find()->where(['entity_id' => $id])->where(['entity_type' => 0]);

        $foster_tags = TableRegistry::get('Tags')->find('list', ['keyField'=>'id','valueField'=>'label'])->where('type_bit & 1')->toArray();

        $attached_tags = TableRegistry::get('Tags_Fosters')->find('list', ['keyField'=>'tag_id','valueField'=>'id'])->where(['foster_id'=>$id])->toArray();

        $foster_tags = array_diff_key($foster_tags, $attached_tags);

        $foster = $this->Fosters->get($id, [
            'contain' => ['Tags', 'CatHistories', 'CatHistories.Cats', 'PhoneNumbers']
        ]);

        $filesDB = TableRegistry::get('Files');

        // get photos and count
        $photos = $filesDB->find('all', [
            'conditions' => [
                'Files.is_photo' => true,
                'Files.entity_type' => $this->Fosters->getEntityTypeId(),
                'entity_id' => $foster->id,
                'Files.is_deleted' => false
                ],
            'order' => ['Files.created'=>'DESC']]);
        $photosCountTotal = $photos->count();

        // for page form
        $uploaded_photo = null;

        // get files and count
        $files = $filesDB->find('all', [
            'conditions' => [
                'Files.is_photo' => false,
                'Files.entity_type' => $this->Fosters->getEntityTypeId(),
                'Files.entity_id' => $foster->id,
                'Files.is_deleted' => false
                ],
            'order' => ['Files.created'=>'DESC']]);
        $filesCountTotal = $files->count();

        // for form on page
        $uploaded_file = null;

        // check for updates and changes
        if($this->request->is('post')) {

            // uploaded a photo?
            if( !empty($this->request->data['uploaded_photo']['name']) && empty($this->request->data['uploaded_file']['name']) ){

                // get file ext
                $uploadedFileName = $this->request->data['uploaded_photo']['name'];
                $nameArray = explode('.', $uploadedFileName);
                $fileExtension = array_pop($nameArray);

                // get other vars to upload photo
                // note, assuming no filenames with periods other than for extension
                // when saving original filename
                $tempLocation = $this->request->data['uploaded_photo']['tmp_name'];
                $uploadPath = 'files/fosters/'.$foster->id;
                $entityTypeId = $this->Fosters->getEntityTypeId();
                $mimeType = $this->request->data['uploaded_photo']['type'];
                $fileSize = $this->request->data['uploaded_photo']['size'];

                // attempt to upload the photo with the file behavior
                $new_file_id = $this->Fosters->uploadPhoto($nameArray[0], $tempLocation, $fileExtension, $uploadPath, 
                    $entityTypeId, $foster->id, $mimeType, $fileSize);

                if ($new_file_id > 0){
                    // set as profile pic if it doesn't already exist
                    if(empty($foster->profile_pic_file_id)) {
                        $foster->profile_pic_file_id = $new_file_id;
                        $this->Fosters->save($foster);
                    }
                    $this->Flash->success(__('Photo has been uploaded and saved successfully.'));
                    $photosCountTotal++;

                } else {
                    $this->Flash->error(__('Unable to upload photo, please try again.'));
                }

            } elseif ( empty($this->request->data['uploaded_photo']['name']) && !empty($this->request->data['uploaded_file']['name']) ) {

                // get file ext
                $uploadedFileName = $this->request->data['uploaded_file']['name'];
                $nameArray = explode('.', $uploadedFileName);
                $fileExtension = array_pop($nameArray);

                // get other vars to upload photo
                $tempLocation = $this->request->data['uploaded_file']['tmp_name'];
                $uploadPath = 'files/fosters/'.$foster->id;
                $entityTypeId = $this->Fosters->getEntityTypeId();
                $mimeType = $this->request->data['uploaded_file']['type'];
                $fileSize = $this->request->data['uploaded_file']['size'];

                // attempt to upload the photo with the file behavior
                $new_file_id = $this->Fosters->uploadDocument($nameArray[0], $tempLocation, $fileExtension, $uploadPath, 
                    $entityTypeId, $foster->id, $mimeType, $fileSize, $this->request->data['file-note']);

                if ($new_file_id > 0){

                    $this->Flash->success(__('File has been uploaded and saved successfully.'));
                    $filesCountTotal++;
                } else {
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a file or photo to upload.'));
            }
            return $this->redirect(['action' => 'view', $id]);
        }
        // profile pic file
        if($foster->profile_pic_file_id > 0) {
            $profile_pic = $filesDB->get($foster->profile_pic_file_id);
        } else {
            $profile_pic = null;
        }

        // get cat profile pics
        if(!empty($foster->cat_histories)) {
            foreach($foster->cat_histories as $cat_hist){
                if($cat_hist->cat->profile_pic_file_id > 0){
                    $cat_hist->cat->profile_pic = $filesDB->get($cat_hist->cat->profile_pic_file_id);
                } else {
                    $cat_hist->cat->profile_pic = null;
                }
            }
        }
        
        $this->set(compact('foster', 'foster_tags', 'uploaded_photo', 'photos', 'photosCountTotal', 'profile_pic', 'phones', 'cat_breeds', 'files', 'filesCountTotal', 'uploaded_file', 'can_delete', 'can_edit'));
        $this->set('_serialize', ['foster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');

        $phoneTable = TableRegistry::get('PhoneNumbers');
        if ($users_model->isFoster($session_user) || $users_model->isVolunteer($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        }

        $foster = $this->Fosters->newEntity();
        if ($this->request->is('post')) {
            $phones= $this->request->data['phones'];
            unset($this->request->data['phones']);

            $foster = $this->Fosters->patchEntity($foster, $this->request->data);
            $foster['is_deleted'] = 0;
            if ($this->Fosters->save($foster)) {
                $id = $foster->id;
                if(!($phones['phone_num'] === '')){
                    for($i = 0; $i < count($phones['phone_type']); $i++) {
                        $new_phone = $phoneTable->newEntity();
                        $new_phone->entity_id = $id;
                        $new_phone->entity_type = 0;
                        $new_phone->phone_type = $phones['phone_type'][$i];
                        $new_phone->phone_num = $phones['phone_num'][$i];
                        if(!($new_phone['phone_num'] === '')){
                            $phoneTable->save($new_phone);
                        }
                    }
                }

                $this->Flash->success(__('The foster has been saved.'));

                return $this->redirect(['action' => 'view', $foster->id]);

            } else {
                $this->Flash->error(__('The foster could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Fosters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('foster', 'tags'));
        $this->set('_serialize', ['foster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Foster id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');
        if ($users_model->isFoster($session_user) || $users_model->isVolunteer($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        }

        $foster = $this->Fosters->get($id, [
            'contain' => ['Tags', 'PhoneNumbers']
        ]);

        $phoneTable = TableRegistry::get('PhoneNumbers');
        $phone = TableRegistry::get('PhoneNumbers')->find()->where(['entity_id' => $id])->where(['entity_type' => 0]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            if(!empty($this->request->data['phones'])){
                $phones = $this->request->data['phones'];
            }

            if(!empty($phones)){
                unset($this->request->data['phones']);
            }
            $foster = $this->Fosters->patchEntity($foster, $this->request->data);
            if ($this->Fosters->save($foster)) {
                
                if(!empty($phones)){
                    for($i = 0; $i < count($phones['phone_type']); $i++) {
                        $new_phone = $phoneTable->newEntity();
                        $new_phone->entity_id = $id;
                        $new_phone->entity_type = 0;
                        $new_phone->phone_type = $phones['phone_type'][$i];
                        $new_phone->phone_num = $phones['phone_num'][$i];
                        if(!($new_phone['phone_num'] === '')){
                            $phoneTable->save($new_phone);
                        }
                    }
                }

                $this->Flash->success(__('The foster has been saved.'));

                return $this->redirect(['action' => 'view', $foster->id]);
            } else {
                $this->Flash->error(__('The foster could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Fosters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('foster', 'tags','phone'));
        $this->set('_serialize', ['foster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Foster id.
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

        //$this->request->allowMethod(['post', 'delete']);
        $foster = $this->Fosters->get($id);
        $this->request->data['is_deleted'] = 1;
        $foster = $this->Fosters->patchEntity($foster, $this->request->data);
        if ($this->Fosters->save($foster)) {

            $cat_histories_table = TableRegistry::get('CatHistories');
            $associations = $cat_histories_table->query();
            $associations->update()
                ->set(['end_date'=>date('Y-m-d')])
                ->where(['foster_id'=>$id])
                ->andWhere(["end_date IS NULL"])
                ->execute();

            $this->Flash->success(__('The foster has been deleted.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The foster could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkAssociations($foster_id){
        $this->autoRender = false;
        $cat_histories_table = TableRegistry::get('CatHistories');
        $associations = $cat_histories_table->findByFosterId($foster_id);
        $associations->where(["end_date IS NULL"]);

        ob_clean();
        echo empty($associations->toArray()) ? '0' : '1';
        exit(0);
    }

    public function attachTag() {
        $this->autoRender = false;
        $tags_fosters = TableRegistry::get('Tags_Fosters');
        $tf = $tags_fosters->newEntity();
        $tf = $tags_fosters->patchEntity($tf, $this->request->data);
        $tags_fosters->save($tf);

        $tag = TableRegistry::get('Tags')->find()->select(['id','label','color'])->where(['id'=>$this->request->data['tag_id']])->first();
        ob_clean();
        echo json_encode($tag);
        exit(0);
    }


    public function deleteTag() {
        $this->autoRender = false;
        $data = $this->request->data;
        $tags_fosters = TableRegistry::get('Tags_Fosters');
        $toDelete = $tags_fosters->find()->where(['tag_id'=>$data['tag_id'], 'foster_id'=>$data['foster_id']])->first();
        $tags_fosters->delete($toDelete);

        ob_clean();
        echo json_encode(TableRegistry::get('Tags')->find()->where(['id'=>$data['tag_id']])->first());
        exit(0);
    }

    public function fosterFromUser($user_id=null) {
        $this->autoRender = false;
        $user = TableRegistry::get('Users')->get($user_id);
        $patch['first_name'] = $user->first_name;
        $patch['last_name'] = $user->last_name;
        $patch['phone'] = $user->phone;
        $patch['email'] = $user->email;
        $patch['address'] = $user->address;
        $patch['is_deleted'] = false;

        $foster = $this->Fosters->newEntity();
        $foster = $this->Fosters->patchEntity($foster, $patch);
        $foster_saved = $this->Fosters->save($foster);
        if ($foster_saved) {
            $user->foster_id = $foster_saved->id;
            TableRegistry::get('Users')->save($user);
            return $this->redirect(['controller'=>'fosters','action'=>'view',$foster_saved->id]);
        } else {
            $this->Flash->error('Something went wrong. Please check your user information and try again.');
            return $this->redirect(['controller'=>'users','action'=>'view',$user_id]);
        }
    }

    public function changeProfilePic() {
        $this->autoRender = false;

        $data = $this->request->data;
        
        $foster = $this->Fosters->get($data['entity_id']);
        $foster->profile_pic_file_id = $data['file_id'];

        ob_clean();
        if($this->Fosters->save($foster)){
            echo 'success';
        } else {
            echo 'error';
        }
        exit(0);
    }

}
