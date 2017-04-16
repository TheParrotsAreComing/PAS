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

        $foster_tags = TableRegistry::get('Tags')->find('list', ['keyField'=>'id','valueField'=>'label'])->where('type_bit & 1')->toArray();

        if(!empty($this->request->query['mobile-search'])){
            $this->paginate['conditions']['first_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if(!empty($this->request->query)){

			if(!empty($this->request->query['tag'])){
				$tagged_fosters = $this->Fosters->buildFilterArray($this->request->query['tag']);
				unset($this->request->query['tag']);
			}

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

            $this->request->data = $this->request->query;
        }
        $rating = [0,1,2,3,4,5,6,7,8,9,10];
        $fosters = $this->paginate($this->Fosters);

        $this->set(compact('fosters', 'foster_cats', 'rating','foster_tags', 'phone_numbers', 'entity_type'));

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
                'entity_id' => $foster->id
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
                $uploadedFileName = $this->request->data['uploaded_photo']['name'];
                $nameArray = explode('.', $uploadedFileName);
                $fileExtension = array_pop($nameArray);

                // get other vars to upload photo
                $tempLocation = $this->request->data['uploaded_photo']['tmp_name'];
                $uploadPath = 'files/fosters/'.$foster->id;
                $entityTypeId = $this->Fosters->getEntityTypeId();
                $mimeType = $this->request->data['uploaded_photo']['type'];
                $fileSize = $this->request->data['uploaded_photo']['size'];

                // attempt to upload the photo with the file behavior
                $new_file_id = $this->Fosters->uploadPhoto($tempLocation, $fileExtension, $uploadPath, 
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

            } else {
                $this->Flash->error(__('Please choose a photo.'));
            }
        }
        // profile pic file
        if($foster->profile_pic_file_id > 0) {
            $profile_pic = $filesDB->get($foster->profile_pic_file_id);
        } else {
            $profile_pic = null;
        }
        
        $this->set(compact('foster', 'foster_tags', 'uploaded_photo', 'photos', 'photosCountTotal', 'profile_pic', 'phone_numbers'));
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

}
