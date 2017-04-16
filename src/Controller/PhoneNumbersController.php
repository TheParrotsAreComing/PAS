<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PhoneNumbers Controller
 *
 * @property \App\Model\Table\PhoneNumbersTable $PhoneNumbers
 */
class PhoneNumbersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fosters', 'Adopters']
        ];
        $phoneNumbers = $this->paginate($this->PhoneNumbers);

        $this->set(compact('phoneNumbers'));
        $this->set('_serialize', ['phoneNumbers']);
    }

    /**
     * View method
     *
     * @param string|null $id Phone Number id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phoneNumber = $this->PhoneNumbers->get($id, [
            'contain' => ['Fosters', 'Adopters']
        ]);

        $this->set('phoneNumber', $phoneNumber);
        $this->set('_serialize', ['phoneNumber']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($entity_id = null, $entity_type = null)
    {
        $phoneNumber = $this->PhoneNumbers->newEntity();
        if ($this->request->is('post')) {
            $phoneNumber = $this->PhoneNumbers->patchEntity($phoneNumber, $this->request->data);
            //debug($phoneNumber);die;
            if ($this->PhoneNumbers->save($phoneNumber)) {
                $this->Flash->success(__('The phone number has been saved.'));

                if ($entity_type === 1){
                    return $this->redirect(['controller' => 'fosters', 'action' => 'view', $entity_id]);
                } else {
                    return $this->redirect(['controller' => 'adopters', 'action' => 'view', $entity_id]);
                }

            }
            $this->Flash->error(__('The phone number could not be saved. Please, try again.'));
        }
        $fosters = $this->PhoneNumbers->Fosters->find('list', ['limit' => 200]);
        $adopters = $this->PhoneNumbers->Adopters->find('list', ['limit' => 200]);
        $this->set(compact('phoneNumber', 'fosters', 'adopters', 'entity_id', 'entity_type'));
        $this->set('_serialize', ['phoneNumber']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Phone Number id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $entity_id = null, $entity_type = null)
    {
        $phoneNumber = $this->PhoneNumbers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phoneNumber = $this->PhoneNumbers->patchEntity($phoneNumber, $this->request->data);
            //debug($phoneNumber);die;
            if ($this->PhoneNumbers->save($phoneNumber)) {
                $this->Flash->success(__('The phone number has been saved.'));
                
                if ($entity_type === 1){
                    return $this->redirect(['controller' => 'fosters', 'action' => 'view', $entity_id]);
                } else{
                    return $this->redirect(['controller' => 'adopters', 'action' => 'view', $entity_id]);
                }

            }
            $this->Flash->error(__('The phone number could not be saved. Please, try again.'));
        }
        $fosters = $this->PhoneNumbers->Fosters->find('list', ['limit' => 200]);
        $adopters = $this->PhoneNumbers->Adopters->find('list', ['limit' => 200]);
        $this->set(compact('phoneNumber', 'fosters', 'adopters', 'entity_id', 'entity_type'));
        $this->set('_serialize', ['phoneNumber']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Phone Number id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $phoneNumber = $this->PhoneNumbers->get($id);
        if ($this->PhoneNumbers->delete($phoneNumber)) {
            $this->Flash->success(__('The phone number has been deleted.'));
        } else {
            $this->Flash->error(__('The phone number could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
