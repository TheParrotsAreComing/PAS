<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
            'contain' => ['Litters', 'Adopters', 'Fosters', 'Files', 'AdoptionEvents', 'Tags', 'CatHistories']
        ]);
        $adoptersDB = TableRegistry::get('Adopters');
        $fostersDB = TableRegistry::get('Fosters');

        $adopter = $adoptersDB->find('all', ['conditions'=>['id'=>$cat['adopter_id']]])->first();
        $foster = $fostersDB->find('all', ['conditions'=>['id'=>$cat['foster_id']]])->first();
        //debug($cat);
        //debug($foster);
        //debug($adopter);die;

        $this->set('adopter', $adopter);
        $this->set('foster', $foster);
        $this->set('cat', $cat);
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

    public function adoptAPetUpload($cat_id) {
        $this->autoRender = false;
        $data = $this->Cats->getAAPUploadArray($cat_id);
        $_serialize = 'data';
        $_enclosure = '';
        $this->response->download('pets.csv');
        $this->viewBuilder()->className('CsvView.Csv');
        $this->set(compact('data', '_serialize','_serialize','_enclosure'));
        $this->autoRender = false;
        $response = $this->render();

        $cfg = tmpfile();
        fwrite($cfg, '#1:Id=Id\r\n#2:Animal=Animal\r\n#3:Breed=Breed\r\n#4:Name=Name\r\n#5:Age=Age');
        fseek($cfg,0);
        $cfg_meta = stream_get_meta_data($cfg);
        $cfg_path = $cfg_meta['uri'];

        $csv = tmpfile();
        fwrite($csv, $response->body());
        fseek($csv,0);
        $csv_meta = stream_get_meta_data($csv);
        $csv_path = $csv_meta['uri'];

        $ftp_stream = ftp_connect('autoupload.adoptapet.com');
        ftp_login($ftp_stream,'6909','XNNDKIOA'); 
        ftp_put($ftp_stream,'import.cfg',$cfg_path,FTP_ASCII);
        ftp_put($ftp_stream,'pets.csv',$csv_path,FTP_ASCII);
        ftp_close($ftp_stream);
        $this->Flash->success('Cat data has been sent to Adopt-A-Pet! Please allow up to a few hours for their pet list to reflect any changes.');
        return $this->redirect(['controller'=>'cats','action'=>'index']);
    }

}
