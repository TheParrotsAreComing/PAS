<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdoptionEvents Controller
 *
 * @property \App\Model\Table\AdoptionEventsTable $AdoptionEvents
 */
class AdoptionEventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $adoptionEvents = $this->paginate($this->AdoptionEvents);

        $this->set(compact('adoptionEvents'));
        $this->set('_serialize', ['adoptionEvents']);
    }

    /**
     * View method
     *
     * @param string|null $id Adoption Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adoptionEvent = $this->AdoptionEvents->get($id, [
            'contain' => ['Cats', 'UsersEvents']
        ]);

        $this->set('adoptionEvent', $adoptionEvent);
        $this->set('_serialize', ['adoptionEvent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adoptionEvent = $this->AdoptionEvents->newEntity();
        if ($this->request->is('post')) {
            $adoptionEvent = $this->AdoptionEvents->patchEntity($adoptionEvent, $this->request->data);
            if ($this->AdoptionEvents->save($adoptionEvent)) {
                $this->Flash->success(__('The adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adoption event could not be saved. Please, try again.'));
        }
        $cats = $this->AdoptionEvents->Cats->find('list', ['limit' => 200]);
        $this->set(compact('adoptionEvent', 'cats'));
        $this->set('_serialize', ['adoptionEvent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adoption Event id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adoptionEvent = $this->AdoptionEvents->get($id, [
            'contain' => ['Cats']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adoptionEvent = $this->AdoptionEvents->patchEntity($adoptionEvent, $this->request->data);
            if ($this->AdoptionEvents->save($adoptionEvent)) {
                $this->Flash->success(__('The adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adoption event could not be saved. Please, try again.'));
        }
        $cats = $this->AdoptionEvents->Cats->find('list', ['limit' => 200]);
        $this->set(compact('adoptionEvent', 'cats'));
        $this->set('_serialize', ['adoptionEvent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adoption Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adoptionEvent = $this->AdoptionEvents->get($id);
        if ($this->AdoptionEvents->delete($adoptionEvent)) {
            $this->Flash->success(__('The adoption event has been deleted.'));
        } else {
            $this->Flash->error(__('The adoption event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
