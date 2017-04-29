<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CatsAdoptionEvents Controller
 *
 * @property \App\Model\Table\CatsAdoptionEventsTable $CatsAdoptionEvents
 */
class CatsAdoptionEventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cats', 'AdoptionEvents']
        ];
        $catsAdoptionEvents = $this->paginate($this->CatsAdoptionEvents);

        $this->set(compact('catsAdoptionEvents'));
        $this->set('_serialize', ['catsAdoptionEvents']);
    }

    /**
     * View method
     *
     * @param string|null $id Cats Adoption Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catsAdoptionEvent = $this->CatsAdoptionEvents->get($id, [
            'contain' => ['Cats', 'AdoptionEvents']
        ]);

        $this->set('catsAdoptionEvent', $catsAdoptionEvent);
        $this->set('_serialize', ['catsAdoptionEvent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catsAdoptionEvent = $this->CatsAdoptionEvents->newEntity();
        if ($this->request->is('post')) {
            $catsAdoptionEvent = $this->CatsAdoptionEvents->patchEntity($catsAdoptionEvent, $this->request->data);
            if ($this->CatsAdoptionEvents->save($catsAdoptionEvent)) {
                $this->Flash->success(__('The cats adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cats adoption event could not be saved. Please, try again.'));
        }
        $cats = $this->CatsAdoptionEvents->Cats->find('list', ['limit' => 200]);
        $adoptionEvents = $this->CatsAdoptionEvents->AdoptionEvents->find('list', ['limit' => 200]);
        $this->set(compact('catsAdoptionEvent', 'cats', 'adoptionEvents'));
        $this->set('_serialize', ['catsAdoptionEvent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cats Adoption Event id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catsAdoptionEvent = $this->CatsAdoptionEvents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catsAdoptionEvent = $this->CatsAdoptionEvents->patchEntity($catsAdoptionEvent, $this->request->data);
            if ($this->CatsAdoptionEvents->save($catsAdoptionEvent)) {
                $this->Flash->success(__('The cats adoption event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cats adoption event could not be saved. Please, try again.'));
        }
        $cats = $this->CatsAdoptionEvents->Cats->find('list', ['limit' => 200]);
        $adoptionEvents = $this->CatsAdoptionEvents->AdoptionEvents->find('list', ['limit' => 200]);
        $this->set(compact('catsAdoptionEvent', 'cats', 'adoptionEvents'));
        $this->set('_serialize', ['catsAdoptionEvent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cats Adoption Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catsAdoptionEvent = $this->CatsAdoptionEvents->get($id);
        if ($this->CatsAdoptionEvents->delete($catsAdoptionEvent)) {
            $this->Flash->success(__('The cats adoption event has been deleted.'));
        } else {
            $this->Flash->error(__('The cats adoption event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
