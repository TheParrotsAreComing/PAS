<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Adopters Controller
 *
 * @property \App\Model\Table\AdoptersTable $Adopters
 */
class AdoptersController extends AppController
{

    /**
     * Index ymethod
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [
            'PhoneNumbers',
            'CatHistories'=>function($q){
                return $q->where(['end_date IS NULL']);
            }, 
            'CatHistories.Cats'],
            'conditions' => ['Adopters.is_deleted' => 0]
        ];

        $phones = TableRegistry::get('PhoneNumbers')->find('all')->where(['phone_type' => 0])->orWhere(['phone_type' => 1])->orWhere(['phone_type' => 2])->andWhere(['entity_type' => 1]);

        $filesDB = TableRegistry::get('Files');

        $adopter_tags = TableRegistry::get('Tags')->find('list', ['keyField'=>'id','valueField'=>'label'])->where('type_bit & 10')->toArray();

        if(!empty($this->request->query['mobile-search'])){
            $this->paginate['conditions']['first_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if(!empty($this->request->query)){

            if(!empty($this->request->query['tag'])){
                $tagged_adopters = $this->Adopters->buildFilterArray($this->request->query['tag']);
                unset($this->request->query['tag']);
            }

            foreach($this->request->query as $field => $query){
                if ($field == 'page'){
                    continue;
                }
                if ($field === 'cat_count' && ($query === 0 || $query != '')){
                    $this->paginate['conditions'][$field] = $query;
                }else if($field == 'do_not_adopt' && $query != ''){
                    $this->paginate['conditions'][$field] = $query;
                }else if (!empty($query)) {
                    $this->paginate['conditions'][$field.' LIKE'] = '%'.$query.'%';
                }
            } 
            if(!empty($tagged_adopters)){
                $this->paginate['conditions']['adopters.id IN'] = $tagged_adopters;
            }
            $this->request->data = $this->request->query;
        }
        $count = [0,1,2,3,4,5];
        $adopters = $this->paginate($this->Adopters);


        foreach($adopters as $adopter) {
            if($adopter->profile_pic_file_id > 0){
                $adopter->profile_pic = $filesDB->get($adopter->profile_pic_file_id);

            } else {
                $adopter->profile_pic = null;
            }

            // get cat profile pics
            if(!empty($adopter->cat_histories)) {
                foreach($adopter->cat_histories as $cat_hist){
                    if($cat_hist->cat->profile_pic_file_id > 0){
                        $cat_hist->cat->profile_pic = $filesDB->get($cat_hist->cat->profile_pic_file_id);
                    } else {
                        $cat_hist->cat->profile_pic = null;
                    }
                }
            }
        }

        $this->set(compact('adopters','adopter_tags', 'phones'));

        $this->set('_serialize', ['adopters']);
    }

    /**
     * View method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cat_breeds = TableRegistry::get('Breeds')->find('all');

        $phones = TableRegistry::get('PhoneNumbers')->find()->where(['entity_id' => $id])->where(['entity_type' => 1]);

        $adopter_tags = TableRegistry::get('Tags')->find('list', ['keyField'=>'id','valueField'=>'label'])->where('type_bit & 10')->toArray();
        $attached_tags = TableRegistry::get('Tags_Adopters')->find('list', ['keyField'=>'tag_id','valueField'=>'id'])->where(['adopter_id'=>$id])->toArray();

        $adopter_tags = array_diff_key($adopter_tags,$attached_tags);
        $adopter = $this->Adopters->get($id, [
            'contain' => ['Tags', 'CatHistories', 'CatHistories.Cats', 'PhoneNumbers']
        ]);

        $filesDB = TableRegistry::get('Files');

        // get photos and count
        $photos = $filesDB->find('all', [
            'conditions' => [
                'Files.is_photo' => true,
                'Files.entity_type' => $this->Adopters->getEntityTypeId(),
                'entity_id' => $adopter->id
                ],
            'order' => ['Files.created'=>'DESC']]);
        $photosCountTotal = $photos->count();

        // for page form
        $uploaded_photo = null;

        // check for updates and changes
        if($this->request->is('post')) {

            // uploaded a photo?
            if(!empty($this->request->data['uploaded_photo']['name'])){

                // get file ext
                // note, assuming no filenames with periods other than for extension
                // when saving original filename
                $uploadedFileName = $this->request->data['uploaded_photo']['name'];
                $nameArray = explode('.', $uploadedFileName);
                $fileExtension = array_pop($nameArray);

                // get other vars to upload photo
                $tempLocation = $this->request->data['uploaded_photo']['tmp_name'];
                $uploadPath = 'files/adopters/'.$adopter->id;
                $entityTypeId = $this->Adopters->getEntityTypeId();
                $mimeType = $this->request->data['uploaded_photo']['type'];
                $fileSize = $this->request->data['uploaded_photo']['size'];

                // attempt to upload the photo with the file behavior
                $new_file_id = $this->Adopters->uploadPhoto($nameArray[0], $tempLocation, $fileExtension, $uploadPath, 
                    $entityTypeId, $adopter->id, $mimeType, $fileSize);

                if ($new_file_id > 0){
                    // set as profile pic if it doesn't already exist
                    if(empty($adopter->profile_pic_file_id)) {
                        $adopter->profile_pic_file_id = $new_file_id;
                        $this->Adopters->save($adopter);
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
        // profile pic file
        if($adopter->profile_pic_file_id > 0) {
            $profile_pic = $filesDB->get($adopter->profile_pic_file_id);
        } else {
            $profile_pic = null;
        }
        $this->set(compact('adopter', 'adopter_tags', 'uploaded_photo', 'photos', 'photosCountTotal', 'profile_pic', 'phones', 'cat_breeds'));
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adopter = $this->Adopters->newEntity();
        if ($this->request->is('post')) {
            $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
            $adopter['is_deleted'] = 0;
            $adopter['cat_count'] = 0;
            if (!$adopter['do_not_adopt']) {
              $adopter['dna_reason'] = NULL;
            }
            if ($this->Adopters->save($adopter)) {
                $this->Flash->success(__('The adopter has been saved.'));

                return $this->redirect(['action' => 'view', $adopter->id]);
                
            } else {
                $this->Flash->error(__('The adopter could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Adopters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('adopter', 'tags'));
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adopter = $this->Adopters->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
            if ($this->Adopters->save($adopter)) {
                $this->Flash->success(__('The adopter has been saved.'));

                return $this->redirect(['action' => 'view', $adopter->id]);
            } else {
                $this->Flash->error(__('The adopter could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Adopters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('adopter', 'tags'));
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $adopter = $this->Adopters->get($id);
        $this->request->data['is_deleted'] = 1;
        $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
        if ($this->Adopters->save($adopter)) {

            $cat_histories_table = TableRegistry::get('CatHistories');
            $associations = $cat_histories_table->query();
            $associations->update()
                ->set(['end_date'=>date('Y-m-d')])
                ->where(['adopter_id'=>$id])
                ->andWhere(["end_date IS NULL"])
                ->execute();

            $this->Flash->success(__('The adopter has been deleted.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The adopter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkAssociations($adopter_id){
        $this->autoRender = false;
        $cat_histories_table = TableRegistry::get('CatHistories');
        $associations = $cat_histories_table->findByAdopterId($adopter_id);
        $associations->where(["end_date IS NULL"]);

        ob_clean();
        echo empty($associations->toArray()) ? '0' : '1';
        exit(0);
    }

    public function attachTag() {
        $this->autoRender = false;
        $tags_adopters = TableRegistry::get('Tags_Adopters');
        $ta = $tags_adopters->newEntity();
        $ta = $tags_adopters->patchEntity($ta, $this->request->data);
        $tags_adopters->save($ta);

        $tag = TableRegistry::get('Tags')->find()->select(['id','label','color'])->where(['id'=>$this->request->data['tag_id']])->first();
        ob_clean();
        echo json_encode($tag);
        exit(0);
    }

    public function deleteTag() {
        $this->autoRender = false;
        $data = $this->request->data;
        $tags_adopters = TableRegistry::get('Tags_Adopters');
        $toDelete = $tags_adopters->find()->where(['tag_id'=>$data['tag_id'], 'adopter_id'=>$data['adopter_id']])->first();
        $tags_adopters->delete($toDelete);

        ob_clean();
        echo json_encode(TableRegistry::get('Tags')->find()->where(['id'=>$data['tag_id']])->first());
        exit(0);
    }

    public function adopterFromUser($user_id=null) {
        $this->autoRender = false;
        $user = TableRegistry::get('Users')->get($user_id);
        $patch['first_name'] = $user->first_name;
        $patch['last_name'] = $user->last_name;
        $patch['phone'] = $user->phone;
        $patch['email'] = $user->email;
        $patch['address'] = $user->address;
        $patch['cat_count'] = 0;
        $patch['is_deleted'] = 0;
        $patch['do_not_adopt'] = 0;

        $adopter = $this->Adopters->newEntity();
        $adopter = $this->Adopters->patchEntity($adopter, $patch);
        $adopter_id = $this->Adopters->save($adopter);
        if ($adopter_id) {
            $user->adopter_id = $adopter_id->id;
            TableRegistry::get('Users')->save($user);
            return $this->redirect(['controller'=>'adopters','action'=>'view',$adopter_id->id]);
        } else {
            $this->Flash->error('Something went wrong. Please check your user information and try again.');
            return $this->redirect(['controller'=>'users','action'=>'view',$user_id]);
        }
    }
}
