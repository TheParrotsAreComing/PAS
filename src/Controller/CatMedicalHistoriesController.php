<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * CatMedicalHistories Controller
 *
 * @property \App\Model\Table\CatMedicalHistoriesTable $CatMedicalHistories
 */
class CatMedicalHistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cats']
        ];
        $catMedicalHistories = $this->paginate($this->CatMedicalHistories);

        $this->set(compact('catMedicalHistories'));
        $this->set('_serialize', ['catMedicalHistories']);
    }

    /**
     * View method
     *
     * @param string|null $id Cat Medical History id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catMedicalHistory = $this->CatMedicalHistories->get($id, [
            'contain' => ['Cats']
        ]);

        $this->set('catMedicalHistory', $catMedicalHistory);
        $this->set('_serialize', ['catMedicalHistory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($cat_id = null)
    {
        $catsDB = TableRegistry::get('Cats');
        $catMedicalHistory = $this->CatMedicalHistories->newEntity();
        $medOption = null;

        if ($this->request->is('post')) {
            $date = $this->request->data['administered_date']['year'];
            $month = $this->request->data['administered_date']['month'];
            $day = $this->request->data['administered_date']['day'];
            $date .= '-'.$month.'-'.$day;
            $this->request->data['administered_date'] = $date;
            $medOption = $this->request->data['medOption'];
            if($medOption == ''){
                $this->Flash->error(__('Please pick a medical option and try again'));
                return;
            }

            switch ($medOption) {
                case 0:
                    $catMedicalHistory->is_fvrcp = true;
                    break;
                case 1:
                    $catMedicalHistory->is_deworm = true;
                    break;
                case 2:
                    $catMedicalHistory->is_flea = true;
                    break;
                case 3:
                    $catMedicalHistory->is_rabies = true;
                    break;
                case 4:
                	$catMedicalHistory->is_other = true;
                	break;
                default:
                    $this->flash->error(__('Please pick a medical option and try again'));
                    return;
            }
            $catMedicalHistory = $this->CatMedicalHistories->patchEntity($catMedicalHistory, $this->request->data);
            $catMedicalHistory->cat_id = $cat_id; 
            if ($this->CatMedicalHistories->save($catMedicalHistory)) {
                $this->Flash->success(__('The cat medical history has been saved.'));
                return $this->redirect(['controller'=>'cats', 'action' => 'view', $cat_id]);
            }
            $this->Flash->error(__('The cat medical history could not be saved. Please, try again.'));
        }
        $cats = $this->CatMedicalHistories->Cats->find('list', ['limit' => 200]);
        $this->set(compact('catMedicalHistory', 'cats', 'cat_id', 'cat', 'cat_name', 'medOption'));
        $this->set('_serialize', ['catMedicalHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Medical History id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $cat_id = null)
    {
        $catMedicalHistory = $this->CatMedicalHistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
           $medOption = $this->request->data['medOption'];
            if($medOption == ''){
                $this->Flash->success(__('The cat medical history has been saved.'));
                return;
            }
            switch ($medOption) {
                case 0:
                    $catMedicalHistory->is_fvrcp = true;
                    break;
                case 1:
                    $catMedicalHistory->is_deworm = true;
                    break;
                case 2:
                    $catMedicalHistory->is_flea = true;
                    break;
                case 3:
                    $catMedicalHistory->is_rabies = true;
                    break;
                default:
                    $this->flash->error(__('Please pick a medical option and try again'));
            } 
            $catMedicalHistory = $this->CatMedicalHistories->patchEntity($catMedicalHistory, $this->request->data);
            if ($this->CatMedicalHistories->save($catMedicalHistory)) {
                $this->Flash->success(__('The cat medical history has been saved.'));

                return $this->redirect(['controller'=>'cats', 'action' => 'view', $cat_id]);
            }
            $this->Flash->error(__('The cat medical history could not be saved. Please, try again.'));
        }
        $cats = $this->CatMedicalHistories->Cats->find('list', ['limit' => 200]);
        $this->set(compact('catMedicalHistory', 'cats', 'cat_id'));
        $this->set('_serialize', ['catMedicalHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Medical History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $cat_id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $catMedicalHistory = $this->CatMedicalHistories->get($id);
        if ($this->CatMedicalHistories->delete($catMedicalHistory)) {
            $this->Flash->success(__('The cat medical history has been deleted.'));
        } else {
            $this->Flash->error(__('The cat medical history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'cats', 'action' => 'view', $cat_id]);
    }
}
