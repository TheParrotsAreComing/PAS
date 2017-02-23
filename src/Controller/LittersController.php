<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Litters Controller
 *
 * @property \App\Model\Table\LittersTable $Litters
 */
class LittersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];
        $litters = $this->paginate($this->Litters);

        $this->set(compact('litters'));
        $this->set('_serialize', ['litters']);
    }

    /**
     * View method
     *
     * @param string|null $id Litter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $litter = $this->Litters->get($id, [
            'contain' => ['Cats']
        ]);

        $this->set('litter', $litter);
        $this->set('_serialize', ['litter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $litter = $this->Litters->newEntity();
        if ($this->request->is('post')) {
            $litter = $this->Litters->patchEntity($litter, $this->request->data);
            if ($this->Litters->save($litter)) {
                $this->Flash->success(__('The litter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The litter could not be saved. Please, try again.'));
        }
        $this->set(compact('litter'));
        $this->set('_serialize', ['litter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Litter id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $litter = $this->Litters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $litter = $this->Litters->patchEntity($litter, $this->request->data);
            if ($this->Litters->save($litter)) {
                $this->Flash->success(__('The litter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The litter could not be saved. Please, try again.'));
        }
        $this->set(compact('litter'));
        $this->set('_serialize', ['litter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Litter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $litter = $this->Litters->get($id);
        if ($this->Litters->delete($litter)) {
            $this->Flash->success(__('The litter has been deleted.'));
        } else {
            $this->Flash->error(__('The litter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
