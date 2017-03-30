<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function add()
    {
        $catMedicalHistory = $this->CatMedicalHistories->newEntity();
        if ($this->request->is('post')) {
            $catMedicalHistory = $this->CatMedicalHistories->patchEntity($catMedicalHistory, $this->request->data);
            if ($this->CatMedicalHistories->save($catMedicalHistory)) {
                $this->Flash->success(__('The cat medical history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat medical history could not be saved. Please, try again.'));
        }
        $cats = $this->CatMedicalHistories->Cats->find('list', ['limit' => 200]);
        $this->set(compact('catMedicalHistory', 'cats'));
        $this->set('_serialize', ['catMedicalHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cat Medical History id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catMedicalHistory = $this->CatMedicalHistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catMedicalHistory = $this->CatMedicalHistories->patchEntity($catMedicalHistory, $this->request->data);
            if ($this->CatMedicalHistories->save($catMedicalHistory)) {
                $this->Flash->success(__('The cat medical history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cat medical history could not be saved. Please, try again.'));
        }
        $cats = $this->CatMedicalHistories->Cats->find('list', ['limit' => 200]);
        $this->set(compact('catMedicalHistory', 'cats'));
        $this->set('_serialize', ['catMedicalHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cat Medical History id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catMedicalHistory = $this->CatMedicalHistories->get($id);
        if ($this->CatMedicalHistories->delete($catMedicalHistory)) {
            $this->Flash->success(__('The cat medical history has been deleted.'));
        } else {
            $this->Flash->error(__('The cat medical history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
