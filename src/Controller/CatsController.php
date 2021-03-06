<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception;
use Cake\Core\Configure;

/**
 * Cats Controller
 *
 * @property \App\Model\Table\CatsTable $Cats
 */
class CatsController extends AppController
{
 
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $session_user = $this->request->session()->read('Auth.User');
        $user_model = TableRegistry::get('Users');

        $can_add = ($user_model->isAdmin($session_user) || $user_model->isCore($session_user));


        $this->paginate = [
            'contain' => ['Litters', 'Breeds', 'Adopters', 'Fosters', 'Files', 'Litters.Cats', 'Litters.Cats.Breeds'],
            'conditions' => ['Cats.is_deleted' => 0, 'Cats.is_deceased' => 0],
			'order' => ['Cats.created'=>'DESC']
        ];

        $session_user = $this->request->session()->read('Auth.User');
        if (TableRegistry::get('Users')->isFoster($session_user)) {
            $foster_cats = array_values(TableRegistry::get('Cat_Histories')->find('list', ['valueField'=>'cat_id'])->where(['foster_id'=>$session_user['foster_id'],'end_date IS NULL'])->toArray());
            $this->paginate['conditions']['Cats.id IN'] = $foster_cats;
        }

        $filesDB = TableRegistry::get('Files');

		$cat_tags = TableRegistry::get('Tags')->find('list', ['keyField'=>'id','valueField'=>'label'])->where('type_bit & 100')->toArray();

		if(!empty($this->request->query['mobile-search'])){
			$this->paginate['conditions']['cat_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
		} else if(!empty($this->request->query)){

			if(!empty($this->request->query['tag'])){
				$tagged_cats = $this->Cats->buildFilterArray($this->request->query['tag']);
				unset($this->request->query['tag']);
			}

			foreach($this->request->query as $field => $query){
				// check the flags first
				if(is_array($query) || $field == 'page'){
					continue;
				}
				if(($field == 'is_deceased' || $field == 'is_deleted') && $query != ''){
                    $this->paginate['conditions']['Cats.'.$field] = (int)$query;
                } else if(($field == 'is_kitten' || $field == 'is_female') && $query != ''){
					$this->paginate['conditions'][$field] = $query;
				}else if($field == 'dob') {
					if(!empty($query)){
						$this->paginate['conditions']['Cats.'.$field] = date('Y-m-d',strtotime($query));
					}
				} else if($field == 'breed_id' && !empty($query)) {
					$this->paginate['conditions'][$field] = $query;
				} else if (!empty($query)) {
					$this->paginate['conditions']['Cats.'.$field.' LIKE'] = '%'.$query.'%';
				}
			}
			if(!empty($tagged_cats)){
				$this->paginate['conditions']['cats.id IN'] = $tagged_cats;
			}

			$this->request->data = $this->request->query;
		}

		$breeds = TableRegistry::get('Breeds')->find('list', ['keyField' => 'id', 'valueField' => 'breed']);

		$cats = $this->paginate($this->Cats);

        foreach($cats as $cat) {
            if($cat->profile_pic_file_id > 0){
                $cat->profile_pic = $filesDB->get($cat->profile_pic_file_id);

                if ($cat->litter_id > 0) {
                    foreach($cat->litter->cats as $sibling) {
                        if($sibling->profile_pic_file_id > 0){
                            $sibling->profile_pic = $filesDB->get($sibling->profile_pic_file_id);
                        }
                    }
                }

            } else {
                $cat->profile_pic = null;
            }
        }

		$this->set(compact('cats', 'breeds', 'cat_tags', 'can_add'));
		$this->set('_serialize', ['cats']);
	}


    /**
     * View method
     *
     * @param string|null $id Cat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');

        $can_delete = ($users_model->isAdmin($session_user));
        $can_edit = ($can_delete || $users_model->isCore($session_user));
        $is_foster = false;

        if ($users_model->isFoster($session_user)) {
            $foster_cats = array_values(TableRegistry::get('Cat_Histories')->find('list', ['valueField'=>'cat_id'])->where(['foster_id'=>$session_user['foster_id'],'end_date IS NULL'])->toArray());
            if (!in_array($id,$foster_cats)) {
                $this->Flash->error("You aren't allowed to do that.");
                return $this->redirect(['controller'=>'cats','action'=>'index']);
            } else {
                $can_edit = $is_foster = true;
            }
        }

        $this->set(compact('can_delete', 'can_edit', 'is_foster'));

        $cat_tags = TableRegistry::get('Tags')->find('list', ['keyField'=>'id','valueField'=>'label'])->where('type_bit & 100')->toArray();
        $attached_tags = TableRegistry::get('Tags_Cats')->find('list', ['keyField'=>'tag_id','valueField'=>'id'])->where(['cat_id'=>$id])->toArray();
        $cat_tags = array_diff_key($cat_tags,$attached_tags);


        $cat = $this->Cats->get($id, [
            'contain' => [
			'Litters', 
			'Breeds',
			'Adopters',
			'Fosters',
			'Files',
			'AdoptionEvents',
			'Tags',	
			'CatMedicalHistories'=>function($q){return $q->order(['CatMedicalHistories.administered_date'=>'DESC']);},
			'CatHistories'=>function($q){ return $q->order(['CatHistories.start_date'=>'DESC'])->where(['CatHistories.end_date IS NULL']); },'CatHistories.Adopters','CatHistories.Fosters']
        ]);

		$cat->cat_medical_histories = $this->Cats->manualGroupMedicalHistories($cat->cat_medical_histories);

        $fosterPhones = TableRegistry::get('PhoneNumbers')->find('all')->where(['phone_type' => 0])->orWhere(['phone_type' => 1])->orWhere(['phone_type' => 2])->andWhere(['entity_type' => 0]);
        $adopterPhones = TableRegistry::get('PhoneNumbers')->find('all')->where(['phone_type' => 0])->orWhere(['phone_type' => 1])->orWhere(['phone_type' => 2])->andWhere(['entity_type' => 1]);
        $adoptersDB = TableRegistry::get('Adopters');
        $fostersDB = TableRegistry::get('Fosters');
        $filesDB = TableRegistry::get('Files');
        $medicalDB = TableRegistry::get('CatMedicalHistories');

        $adopters = $adoptersDB->find('all');
        $adopters->where(['is_deleted' => 0,'do_not_adopt IS NOT'=>1]);

		$select_adopters = [];
		foreach($adopters as $ad){
			$select_adopters[$ad->id] = $ad->first_name.' '.$ad->last_name;
		}
        asort($select_adopters);

        // available fosters
        $fosters = $fostersDB->find('all');
        $fosters->where(['is_deleted' => 0]);
        $select_fosters = [];
        foreach($fosters as $fo){
            $select_fosters[$fo->id] = $fo->first_name.' '.$fo->last_name;
        }
        asort($select_fosters);

        $documents = $filesDB->find('all',[
            'conditions' => [
                'Files.is_photo' => false,
                'Files.entity_type' => $this->Cats->getEntityTypeId(),
                'entity_id' => $cat->id
                ],
            'order' => ['Files.created'=>'DESC']]);
        $documentsCountTotal = $documents->count();   


        // get photos and count
        $photos = $filesDB->find('all', [
            'conditions' => [
                'Files.is_photo' => true,
                'Files.entity_type' => $this->Cats->getEntityTypeId(),
                'Files.entity_id' => $cat->id,
                'Files.is_deleted' => false
                ],
            'order' => ['Files.created'=>'DESC']]);
        $photosCountTotal = $photos->count();

        // for form on page
        $uploaded_photo = null;

        // get files and count
        $files = $filesDB->find('all', [
            'conditions' => [
                'Files.is_photo' => false,
                'Files.entity_type' => $this->Cats->getEntityTypeId(),
                'Files.entity_id' => $cat->id,
                'Files.is_deleted' => false
                ],
            'order' => ['Files.created'=>'DESC']]);
        $filesCountTotal = $files->count();

        // for form on page
        $uploaded_file = null;

        if($this->request->is('post')) {

        	//uploading a file
            if( !empty($this->request->data['uploaded_photo']['name']) && empty($this->request->data['uploaded_file']['name']) ){

                // get file ext
                // note, assuming no filenames with periods other than for extension
                // when saving original filename
                $uploadedFileName = $this->request->data['uploaded_photo']['name'];
                $nameArray = explode('.', $uploadedFileName);
                $fileExtension = array_pop($nameArray);

                // get other vars to upload photo
                $tempLocation = $this->request->data['uploaded_photo']['tmp_name'];
                $uploadPath = 'files/cats/'.$cat->id;
                $entityTypeId = $this->Cats->getEntityTypeId();
                $mimeType = $this->request->data['uploaded_photo']['type'];
                $fileSize = $this->request->data['uploaded_photo']['size'];

                // attempt to upload the photo with the file behavior
                $new_file_id = $this->Cats->uploadPhoto($nameArray[0], $tempLocation, $fileExtension, $uploadPath, 
                    $entityTypeId, $cat->id, $mimeType, $fileSize);

                if ($new_file_id > 0){

                	if(empty($cat->profile_pic_file_id)) {
                		$cat->profile_pic_file_id = $new_file_id;
                		$this->Cats->save($cat);
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

                // get other vars to upload file
                $tempLocation = $this->request->data['uploaded_file']['tmp_name'];
                $uploadPath = 'files/cats/'.$cat->id;
                $entityTypeId = $this->Cats->getEntityTypeId();
                $mimeType = $this->request->data['uploaded_file']['type'];
                $fileSize = $this->request->data['uploaded_file']['size'];

                // attempt to upload the file with the file behavior
                $new_file_id = $this->Cats->uploadDocument($uploadedFileName, $tempLocation, $fileExtension, $uploadPath, 
                    $entityTypeId, $cat->id, $mimeType, $fileSize, $this->request->data['file-note']);

                if ($new_file_id > 0){

                    $this->Flash->success(__('File has been uploaded and saved successfully.'));
                    $filesCountTotal++;
                } else {
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }

            }
            else {
                $this->Flash->error(__('Please choose a file or photo to upload.'));
            }
            return $this->redirect(['action' => 'view', $id]);
        }

        // profile pic file
        if($cat->profile_pic_file_id > 0){
        	$profile_pic = $filesDB->get($cat->profile_pic_file_id);
        } else {
        	$profile_pic = null;
        }

        if(!empty($cat->cat_histories)) {
            foreach($cat->cat_histories as $ch) {
                if($ch->adopter_id > 0 && $ch->adopter->profile_pic_file_id > 0) {
                    $ch->profile_pic = $filesDB->get($ch->adopter->profile_pic_file_id);
                }
                else if ($ch->foster_id > 0 && $ch->foster->profile_pic_file_id > 0){
                    $ch->profile_pic = $filesDB->get($ch->foster->profile_pic_file_id);
                }
                else {
                    $ch->profile_pic = null;
                }
            }
        }

		$this->set(compact('cat','foster','adopter','select_adopters', 'select_fosters', 'uploaded_photo', 'photos', 'photosCountTotal', 'cat_tags', 'profile_pic', 'documents', 'documentsCountTotal', 'fosterPhones', 'adopterPhones', 'files', 'filesCountTotal', 'uploaded_file'));

        $this->set('_serialize', ['cat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($litter_id = null)
    {
        $session_user = $this->request->session()->read('Auth.User');
        $users_model = TableRegistry::get('Users');
        if ($users_model->isFoster($session_user) || $users_model->isVolunteer($session_user)) {
            $this->Flash->error("You aren't allowed to do that.");
            return $this->redirect(['controller'=>'cats','action'=>'index']);
        }
        
		$dob = false;

		if(!empty($litter_id)){
			$dob = $this->request->session()->read('Litter_DOB');
		}
        $cat = $this->Cats->newEntity();

        if ($this->request->is('post')) {

            $addMoreCats = $this->request->data['addMoreCats'];
            unset($this->request->data['addMoreCats']);

            //Extract and put together birthdate into db format
            $dob =  $this->request->data['dob']['year'];
            $month = $this->request->data['dob']['month'];
            $day = $this->request->data['dob']['day'];
            $dob .= '-'.$month.'-'.$day;
            $this->request->data['dob'] = $dob;

            //Initial creation, not deleted 
            $this->request->data['is_deleted'] = 0;

            //Initial creation, not deceased
            $this->request->data['is_deceased'] = 0;

            //Converting values to boolean
            $this->request->data['is_kitten'] = (bool) $this->request->data['is_kitten'];
            $this->request->data['is_female'] = (bool) $this->request->data['is_female'];
            $this->request->data['is_microchip_registered'] = (bool) $this->request->data['is_microchip_registered'];
            $this->request->data['good_with_kids'] = (bool) $this->request->data['good_with_kids'];
            $this->request->data['good_with_dogs'] = (bool) $this->request->data['good_with_dogs'];
            $this->request->data['good_with_cats'] = (bool) $this->request->data['good_with_cats'];
            $this->request->data['special_needs'] = (bool) $this->request->data['special_needs'];
            $this->request->data['needs_experienced_adopter'] = (bool) $this->request->data['needs_experienced_adopter'];

            // attach the cat to the litter, and update litter counts 
            if (!empty($litter_id)) {
                $this->request->data['litter_id'] = $litter_id;
                $cat = $this->Cats->patchEntity($cat, $this->request->data);
                $this->Cats->attachToLitter($litter_id, $cat);
            }
            else {
                $cat = $this->Cats->patchEntity($cat, $this->request->data);
            }

            if ($this->Cats->save($cat)) {

                $this->Flash->success(__('The cat has been saved.'));

                if ($addMoreCats) {
                    return $this->redirect(['action' => 'add', $litter_id]);
                }
                else if (!empty($litter_id)) {
                    return $this->redirect(['controller' => 'litters', 'action' => 'index']);   
                }
                else {
					if(!empty($litter_id)){
						$dob = $this->request->session()->delete('Litter_DOB');
					}
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__(json_encode($cat->errors())));
            }
        }

        $litters = $this->Cats->Litters->find('list', ['limit' => 200]);
        $adopters = $this->Cats->Adopters->find('list', ['limit' => 200]);
        $fosters = $this->Cats->Fosters->find('list', ['limit' => 200]);
        $files = $this->Cats->Files->find('list', ['limit' => 200]);
        $adoptionEvents = $this->Cats->AdoptionEvents->find('list', ['limit' => 200]);
        $tags = $this->Cats->Tags->find('list', ['limit' => 200]);
        $breeds = TableRegistry::get('Breeds')->find('list', ['keyField'=>'id', 'valueField'=>'breed']);

        $this->set(compact('dob','cat', 'litters', 'adopters', 'fosters', 'files', 'adoptionEvents', 'tags', 'litter_id', 'breeds'));
        $this->set('_serialize', ['cat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat id.
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

        $cat = $this->Cats->get($id, [
            'contain' => ['AdoptionEvents', 'Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cat = $this->Cats->patchEntity($cat, $this->request->data);
            if ($this->Cats->save($cat)) {
                $this->Flash->success(__('The cat has been saved.'));
                return $this->redirect(['action' => 'view', $cat->id]);
            } else {
                $this->Flash->error(__('The cat could not be saved. Please, try again.'));
            }
        }

        $gwkids = ($cat->good_with_kids) ? true : false;
        $gwdogs = ($cat->good_with_dogs) ? true : false;
        $gwcats = ($cat->good_with_cats) ? true : false;
        $special = ($cat->special_needs) ? true : false;
        $exp = ($cat->needs_experienced_adopter) ? true : false;
        $deceased = ($cat->is_deceased) ? true : false;
        $this->set(compact('gwkids','gwdogs','gwcats','special','exp','deceased'));

        $litters = $this->Cats->Litters->find('list', ['limit' => 200]);
        $adopters = $this->Cats->Adopters->find('list', ['limit' => 200]);
        $fosters = $this->Cats->Fosters->find('list', ['limit' => 200]);
        $files = $this->Cats->Files->find('list', ['limit' => 200]);
        $adoptionEvents = $this->Cats->AdoptionEvents->find('list', ['limit' => 200]);
        $tags = $this->Cats->Tags->find('list', ['limit' => 200]);
        $breeds = TableRegistry::get('Breeds')->find('list', ['keyField'=>'id', 'valueField'=>'breed']);
        $this->set(compact('cat', 'litters', 'adopters', 'fosters', 'files', 'adoptionEvents', 'tags', 'breeds'));
        $this->set('_serialize', ['cat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat id.
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
        $cat = $this->Cats->get($id);
        $this->request->data['is_deleted'] = 1;
        $cat = $this->Cats->patchEntity($cat, $this->request->data);
        if ($this->Cats->save($cat)) {
            if (!empty($cat->litter_id)) {
                $litters_table = TableRegistry::get('Litters');
                $litter = $litters_table->find('all')
                    ->where(['id' => $cat->litter_id])
                    ->first();
                if ($cat->is_kitten) {
                    $litter->kitten_count = $litter->kitten_count - 1;
                } else {
                    $litter->the_cat_count = $litter->the_cat_count - 1;
                }
                $litters_table->save($litter);
            }
            $this->Flash->success(__('The cat has been deleted.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The cat could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function aapUpload($cat_id) {
        $cat = $this->Cats->get($cat_id);
        $gwkids = ($cat->good_with_kids) ? true : false;
        $gwdogs = ($cat->good_with_dogs) ? true : false;
        $gwcats = ($cat->good_with_cats) ? true : false;
        $special = ($cat->special_needs) ? true : false;
        $exp = ($cat->needs_experienced_adopter) ? true : false;
        $breeds = TableRegistry::get('Breeds')->find('list', ['keyField'=>'id', 'valueField'=>'breed']);
        $colors = TableRegistry::get('Colors')->find('list', ['keyField'=>'color', 'valueField'=>'color']);

        if ($this->request->is('post')) {
            $cat = $this->Cats->patchEntity($cat, $this->request->data);
            $this->Cats->save($cat);
            $data = $this->Cats->getAAPUploadArray($cat_id, $this->request->data);
            $_serialize = 'data';
            $_enclosure = '"';
            $this->response->download('pets.csv');
            $this->viewBuilder()->className('CsvView.Csv');
            $this->set(compact('data', '_serialize','_serialize','_enclosure'));
            $this->autoRender = false;
            $response = $this->render();

            $cfg = tmpfile();
            fwrite($cfg, "#1:id=Id\r\n#2:breed=Breed\r\n#3:coat=HairLength\r\n#4:cat_name=Name\r\n#5:bio=Description\r\n#6:good_with_kids=GoodWKids\r\n#7:good_with_dogs=GoodWDogs\r\n#8:good_with_cats=GoodWCats\r\n#9:special_needs=SpecialNeeds\r\n#10:needs_experienced_adopter=NeedsExperiencedAdopter\r\n#11:Animal=Animal\r\n#12:Sex=Sex\r\n#13:Age=Age\r\n#14:Status=Status\r\n#15:Color=Color\r\n#16:SpayedNeutered=SpayedNeutered\r\n#17:ShotsCurrent=ShotsCurrent\r\n#18:Declawed=Declawed\r\n#19:Housetrained=Housetrained");
            fseek($cfg,0);
            $cfg_meta = stream_get_meta_data($cfg);
            $cfg_path = $cfg_meta['uri'];

            $csv = tmpfile();
            fwrite($csv, $response->body());
            fseek($csv,0);
            $csv_meta = stream_get_meta_data($csv);
            $csv_path = $csv_meta['uri'];

            $ftp_stream = ftp_connect('autoupload.adoptapet.com');
            ftp_login($ftp_stream,Configure::read('AdoptAPet_Credentials')['username'],Configure::read('AdoptAPet_Credentials')['password']);
            if (ftp_put($ftp_stream,'import.cfg',$cfg_path,FTP_ASCII)) {
                if (ftp_put($ftp_stream,'pets.csv',$csv_path,FTP_ASCII)) {
                    ftp_close($ftp_stream);
                    $this->Flash->success('Cat data has been sent to Adopt-A-Pet! Please allow up to a few hours for their pet list to reflect any changes.');
                    return $this->redirect(['controller'=>'cats','action'=>'index']);
                }
            } 
            ftp_close($ftp_stream);
            $this->Flash->error('There was a problem with the upload!');
            return $this->redirect($this->referer());
        }

        $this->set(compact('cat','gwkids','gwdogs','gwcats','special','exp','breeds','colors'));

    }

	public function attachAdopter($adopter_id,$cat_id,$fee){
		//Ajax doesn't need this page to render
		$this->autoRender = false;

		try{
			$adopter_table = TableRegistry::get('Adopters');
			$cat_histories_table = TableRegistry::Get('CatHistories');

			$cat_histories_table->updateAll(['end_date'=>date('Y-m-d')],['end_date IS NULL','cat_id'=>$cat_id]);
			$history_entry = $cat_histories_table->newEntity();

			//We need to adopter info for a dynamic card on the view
			$attachee = $adopter_table->get($adopter_id);
			$history_entry->cat_id = $cat_id;
			$history_entry->adopter_id = $adopter_id;
			$history_entry->start_date = date('Y-m-d');

            $this->Cats->updateFee($cat_id, $fee);

			//If it works, let's return the adopter
			if($cat_histories_table->save($history_entry)){
				$response = json_encode($attachee);
			}else{
				//If not return a stringified array so JSON.parse() won't break
				$response = '[error saving]';
			}

		}catch(\Exception $e){
			//Something happened fo sho
			$response = json_encode($e->getMessage());
		}

		//Let's return the response
		ob_clean();
		echo $response;
		exit(0);
	}


    public function attachFoster($foster_id,$cat_id){
        //Ajax doesn't need this page to render
        $this->autoRender = false;

        try{
            $foster_table = TableRegistry::get('Fosters');
            $cat_histories_table = TableRegistry::Get('CatHistories');

			$cat_histories_table->updateAll(['end_date'=>date('Y-m-d')],['end_date IS NULL','cat_id'=>$cat_id]);

            $history_entry = $cat_histories_table->newEntity();

            //We need to adopter info for a dynamic card on the view
            $attachee = $foster_table->get($foster_id);
            $history_entry->cat_id = $cat_id;
            $history_entry->foster_id = $foster_id;
            $history_entry->start_date = date('Y-m-d');

            //If it works, let's return the foster
            if($cat_histories_table->save($history_entry)){
                $response = json_encode($attachee);
            }else{
                //If not return a stringified array so JSON.parse() won't break
                $response = '[error saving]';
            }

        }catch(\Exception $e){
            //Something happened fo sho
            $response = json_encode($e->getMessage());
        }

        //Let's return the response
        ob_clean();
        echo $response;
        exit(0);
    }


    public function attachTag() {
        $this->autoRender = false;
        $tags_cats = TableRegistry::get('Tags_Cats');
        $tc = $tags_cats->newEntity();
        $tc = $tags_cats->patchEntity($tc, $this->request->data);
        $tags_cats->save($tc);

        $tag = TableRegistry::get('Tags')->find()->select(['id','label','color'])->where(['id'=>$this->request->data['tag_id']])->first();
        ob_clean();
        echo json_encode($tag);
        exit(0);
    }

    public function deleteTag() {
        $this->autoRender = false;
        $data = $this->request->data;
        $tags_cats = TableRegistry::get('Tags_Cats');
        $toDelete = $tags_cats->find()->where(['tag_id'=>$data['tag_id'], 'cat_id'=>$data['cat_id']])->first();
        $tags_cats->delete($toDelete);

        ob_clean();
        echo json_encode(TableRegistry::get('Tags')->find()->where(['id'=>$data['tag_id']])->first());
        exit(0);
    }

    public function changeProfilePic() {
        $this->autoRender = false;

        $data = $this->request->data;
        
        $cat = $this->Cats->get($data['entity_id']);
        $cat->profile_pic_file_id = $data['file_id'];

        ob_clean();
        if($this->Cats->save($cat)){
            echo 'success';
        } else {
            echo 'error';
        }
        exit(0);
    }


}
