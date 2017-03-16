<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception;

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
        $this->paginate = [
            'contain' => ['Litters', 'Adopters', 'Fosters', 'Files', 'Litters.Cats'],
            'conditions' => ['Cats.is_deleted' => 0]
        ];

        if(!empty($this->request->query['mobile-search'])){
            $this->paginate['conditions']['cat_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if(!empty($this->request->query)){
            foreach($this->request->query as $field => $query){
                // check the flags first
                if(($field == 'is_kitten' || $field == 'is_female') && $query != ''){
                    $this->paginate['conditions'][$field] = $query;
                }else if($field == 'dob') {
                    if(!empty($query)){
                        $this->paginate['conditions']['cats.'.$field] = date('Y-m-d',strtotime($query));
                }
                } else if (!empty($query)) {
                    $this->paginate['conditions']['cats.'.$field.' LIKE'] = '%'.$query.'%';
                }
            }
			$this->request->data = $this->request->query;
        }




        $cats = $this->paginate($this->Cats);

        $this->set(compact('cats'));
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
        $cat = $this->Cats->get($id, [
            'contain' => ['Litters', 'Adopters', 'Fosters', 'Files', 'AdoptionEvents', 'Tags', 'CatHistories'=>function($q){ return $q->order(['CatHistories.start_date'=>'DESC']); },'CatHistories.Adopters','CatHistories.Fosters']
        ]);
        $adoptersDB = TableRegistry::get('Adopters');
        $fostersDB = TableRegistry::get('Fosters');
		
        $adopter = $adoptersDB->find('all', ['conditions'=>['id'=>$cat['adopter_id']]])->first();
        $foster = $fostersDB->find('all', ['conditions'=>['id'=>$cat['foster_id']]])->first();

        $adopters = $adoptersDB->find('all');
		$select_adopters = [];
		foreach($adopters as $ad){
			$select_adopters[$ad->id] = $ad->first_name.' '.$ad->last_name;
		}
        $fosters = $fostersDB->find('all');
        $select_fosters = [];
        foreach($fosters as $fo){
            $select_fosters[$fo->id] = $fo->first_name.' '.$fo->last_name;
        }

		$this->set(compact('cat','foster','adopter','select_adopters', 'select_fosters'));
        $this->set('_serialize', ['cat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($litter_id = null)
    {
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

            //Converting values to boolean
            $this->request->data['is_kitten'] = (bool) $this->request->data['is_kitten'];
            $this->request->data['is_female'] = (bool) $this->request->data['is_female'];
            $this->request->data['is_microchip_registered'] = (bool) $this->request->data['is_microchip_registered'];

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



        $this->set(compact('cat', 'litters', 'adopters', 'fosters', 'files', 'adoptionEvents', 'tags', 'litter_id'));
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
        $litters = $this->Cats->Litters->find('list', ['limit' => 200]);
        $adopters = $this->Cats->Adopters->find('list', ['limit' => 200]);
        $fosters = $this->Cats->Fosters->find('list', ['limit' => 200]);
        $files = $this->Cats->Files->find('list', ['limit' => 200]);
        $adoptionEvents = $this->Cats->AdoptionEvents->find('list', ['limit' => 200]);
        $tags = $this->Cats->Tags->find('list', ['limit' => 200]);
        $this->set(compact('cat', 'litters', 'adopters', 'fosters', 'files', 'adoptionEvents', 'tags'));
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
        //$this->request->allowMethod(['post', 'delete']);
        $cat = $this->Cats->get($id);
        $this->request->data['is_deleted'] = 1;
        $cat = $this->Cats->patchEntity($cat, $this->request->data);
        if ($this->Cats->save($cat)) {
            $this->Flash->success(__('The cat has been deleted.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The cat could not be saved. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


	public function attachAdopter($adopter_id,$cat_id){
		//Ajax doesn't need this page to render
		$this->autoRender = false;

		try{
			$adopter_table = TableRegistry::get('Adopters');
			$cat_histories_table = TableRegistry::Get('CatHistories');

			$history_entry = $cat_histories_table->newEntity();

			//We need to adopter info for a dynamic card on the view
			$attachee = $adopter_table->get($adopter_id);
			$history_entry->cat_id = $cat_id;
			$history_entry->adopter_id = $adopter_id;
			$history_entry->start_date = date('Y-m-d');

			//If it works, let's reutn the adopter
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

            $history_entry = $cat_histories_table->newEntity();

            //We need to adopter info for a dynamic card on the view
            $attachee = $foster_table->get($foster_id);
            $history_entry->cat_id = $cat_id;
            $history_entry->foster_id = $foster_id;
            $history_entry->start_date = date('Y-m-d');

            //If it works, let's reutn the adopter
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

}
