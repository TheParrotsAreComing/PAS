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
        $this->paginate = [
            'contain' => [ 
            'PhoneNumbers',
            'CatHistories'=>function($q){
                return $q->where(['end_date IS NULL']);
            }, 
            'CatHistories.Cats'],
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
                if ($field == 'rating' && !empty($query)){
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


        $this->set(compact('fosters', 'foster_cats', 'rating','foster_tags', 'phones'));
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
        $cat_breeds = TableRegistry::get('Breeds')->find('all');

        //debug($cat_breeds); die;

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
        
        $this->set(compact('foster', 'foster_tags', 'uploaded_photo', 'photos', 'photosCountTotal', 'profile_pic', 'phones', 'cat_breeds', 'files', 'filesCountTotal', 'uploaded_file'));
        $this->set('_serialize', ['foster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foster = $this->Fosters->newEntity();
        if ($this->request->is('post')) {
            $foster = $this->Fosters->patchEntity($foster, $this->request->data);
            $foster['is_deleted'] = 0;
            if ($this->Fosters->save($foster)) {
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
        $foster = $this->Fosters->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foster = $this->Fosters->patchEntity($foster, $this->request->data);
            if ($this->Fosters->save($foster)) {
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
     * Delete method
     *
     * @param string|null $id Foster id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
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
