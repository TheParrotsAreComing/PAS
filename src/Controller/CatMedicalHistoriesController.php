<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

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
        $filesDB = TableRegistry::get('Files');
        $catMedicalHistory = $this->CatMedicalHistories->newEntity();
        $medOption = null;
        $upload_document = null;

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
                	$catMedicalHistory->is_next_service = true;
                	break;
                case 1:
                    $catMedicalHistory->is_spay = true;
                    break;
                case 2:
                    $catMedicalHistory->is_neuter = true;
                    break;
                case 3:
                    $catMedicalHistory->is_fvrcp = true;
                    break;
                case 4:
                    $catMedicalHistory->is_deworm = true;
                    break;
                case 5:
                    $catMedicalHistory->is_flea = true;
                    break;
                case 6:
                    $catMedicalHistory->is_rabies = true;
                    break;
                case 7:
                    $catMedicalHistory->is_blood = true;
                    break;
                case 8:
                	$catMedicalHistory->is_other = true;
                	break;
                case 9:
                	$catMedicalHistory->is_note = true;
                	break;
                default:
                    $this->flash->error(__('Please pick a medical option and try again'));
                    return;
            }
            if (!empty($this->request->data['upload_document']['name'])) {
                $uploadedFileName = $this->request->data['upload_document']['name'];
                $nameArray = explode('.', $uploadedFileName);
                $fileExtension = array_pop($nameArray);
                $tempLocation = $this->request->data['upload_document']['tmp_name'];
                $uploadPath = 'files/cats/'.$cat_id;
                $entityTypeId = $this->CatMedicalHistories->getEntityTypeId();
                $mimeType = $this->request->data['upload_document']['type'];
                $fileSize = $this->request->data['upload_document']['size'];
                $new_file_id = $this->CatMedicalHistories->uploadDocument($uploadedFileName, $tempLocation, $fileExtension, $uploadPath, $entityTypeId, $cat_id, $mimeType, $fileSize, '');
                if ($new_file_id > 0){
                    $catMedicalHistory->file_id = $new_file_id; 
                    $this->Flash->success(__('Document has been uploaded and saved successfully.'));
                } else {
                    $this->Flash->error(__('Unable to upload document, please try again.'));
                }
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
        $this->set(compact('catMedicalHistory', 'cats', 'cat_id', 'cat', 'cat_name', 'medOption', 'upload_document'));
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
        $medOption = "";
        if ($catMedicalHistory->is_next_service) {
            $medOption = 0;
        }
        if ($catMedicalHistory->is_spay) {
            $medOption = 1;
        }
        if ($catMedicalHistory->is_neuter) {
            $medOption = 2;
        }
        if ($catMedicalHistory->is_fvrcp) {
            $medOption = 3;
        }
        if ($catMedicalHistory->is_deworm) {
            $medOption = 4;
        }
        if ($catMedicalHistory->is_flea) {
            $medOption = 5;
        }
        if ($catMedicalHistory->is_rabies) {
            $medOption = 6;
        }
        if ($catMedicalHistory->is_blood) {
            $medOption = 7;
        }
        if ($catMedicalHistory->is_other) {
            $medOption = 8;
        }
        if ($catMedicalHistory->is_note) {
            $medOption = 9;
        }
         
        if ($this->request->is(['patch', 'post', 'put'])) {
           $medOption = $this->request->data['medOption'];
            if($medOption == ''){
                $this->Flash->success(__('The cat medical history has been saved.'));
                return;
            }
            switch ($medOption) {
                case 0:
                    $catMedicalHistory->is_next_service = true;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 1:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = true;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 2:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = true;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 3:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = true;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 4:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = true;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 5:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = true;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 6:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = true;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 7:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = true;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = false;
                    break;
                case 8:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = true;
                    $catMedicalHistory->is_note = false;
                    break;
                case 9:
                    $catMedicalHistory->is_next_service = false;
                    $catMedicalHistory->is_spay = false;
                    $catMedicalHistory->is_neuter = false;
                    $catMedicalHistory->is_fvrcp = false;
                    $catMedicalHistory->is_deworm = false;
                    $catMedicalHistory->is_flea = false;
                    $catMedicalHistory->is_rabies = false;
                    $catMedicalHistory->is_blood = false;
                    $catMedicalHistory->is_other = false;
                    $catMedicalHistory->is_note = true;
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
        $this->set(compact('catMedicalHistory', 'cats', 'cat_id', 'medOption'));
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

    /*
     * Create a PDF of a cat's medical history, as per chart provided
     * @param cat_id ID of the cat in question
     * @author Eric Bollinger - 7/11/17
     */
    public function printMedicalHistory($cat_id) {
        $this->autoRender = false;
        $histories = $this->CatMedicalHistories->formatForPrint($cat_id);

        require_once(ROOT.DS.'vendor'.DS.'tecnickcom'.DS.'tcpdf'.DS.'tcpdf.php');

        $pdf = new \tcpdf('P', 'mm', 'A4', true, 'UTF-8', false);
        mb_internal_encoding('UTF-8');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->LastPage();

        $this->loadComponent('MedicalHistory');
        $this->MedicalHistory->drawDoc($pdf, $histories);
        $pdf->Output($histories['cat']['cat_name'].' Medical History.pdf', 'I');


    }
}
