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
            'contain' => ['Cats'],
            'conditions' => ['Litters.is_deleted' => 0]
        ];

		if(!empty($this->request->query['mobile-search'])){
			$this->paginate['conditions']['litter_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
		}else if(!empty($this->request->query)){
			foreach($this->request->query as $field => $query){
				if($field == 'dob'){
                    if(!empty($query)){
					   $this->paginate['conditions'][$field] = date('Y-m-d',strtotime($query));
                    }
				}else if(!empty($query)){
					if(preg_match('/count/',$field)){
						$this->paginate['conditions'][$field] = $query;
					}else{
						$this->paginate['conditions'][$field.' LIKE'] = '%'.$query.'%';
					}
				}
			}
            $this->request->data = $this->request->query;
		}

        $litters = $this->paginate($this->Litters);
		
		$count = [0,1,2,3,4,5,6,7,8,10,11,12,13,14,15];
        $this->set(compact('litters','count'));
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
            
            // extract and put together birthdate into proper format
            $year =  $this->request->data['dob']['year'];
            $month = $this->request->data['dob']['month'];
            $day = $this->request->data['dob']['day'];
            $dob = $year.'-'.$month.'-'.$day;
            $this->request->data['dob'] = $dob;

            // initial creation, not deleted
            $this->request->data['is_deleted'] = 0;
            $this->request->data['the_cat_count'] = 0;
            $this->request->data['kitten_count'] = 0;

            $litter = $this->Litters->patchEntity($litter, $this->request->data);
            
            if ($this->Litters->save($litter)) {
                $this->Flash->success(__('The litter has been saved.'));

				$this->request->session()->write('Litter_DOB',$dob);
                return $this->redirect(['controller' => 'cats', 'action' => 'add', $litter->id]);
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

                return $this->redirect(['action' => 'view', $litter->id]);
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
        $litter = $this->Litters->get($id);
        $this->request->data['is_deleted'] = 1;
        $litter = $this->Litters->patchEntity($litter, $this->request->data);
        if ($this->Litters->save($litter)) {
            $this->Flash->success(__('The litter has been deleted'));
            return $this->redirect(['controller' => 'litters', 'action' => 'index']);
        } else {
            $this->Flash->error(__('The litter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'litters', 'action' => 'index']);
    }
}
