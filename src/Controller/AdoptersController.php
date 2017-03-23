<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Adopters Controller
 *
 * @property \App\Model\Table\AdoptersTable $Adopters
 */
class AdoptersController extends AppController
{

    /**
     * Index ymethod
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [
            'CatHistories'=>function($q){
                return $q->where(['end_date IS NULL']);
            }, 
            'CatHistories.Cats'],
            'conditions' => ['Adopters.is_deleted' => 0]
        ];

        if(!empty($this->request->query['mobile-search'])){
            $this->paginate['conditions']['first_name LIKE'] = '%'.$this->request->query['mobile-search'].'%';
        } else if(!empty($this->request->query)){
            foreach($this->request->query as $field => $query){
                if ($field === 'cat_count' && ($query === 0 || $query != '')){
                    $this->paginate['conditions'][$field] = $query;
                }else if($field == 'do_not_adopt' && $query != ''){
                    $this->paginate['conditions'][$field] = $query;
                }else if (!empty($query)) {
                    $this->paginate['conditions'][$field.' LIKE'] = '%'.$query.'%';
                }
            } 
            $this->request->data = $this->request->query;
        }
        $count = [0,1,2,3,4,5];
        $adopters = $this->paginate($this->Adopters);
        $this->set(compact('adopters'));
        $this->set('_serialize', ['adopters']);
    }

    /**
     * View method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adopter = $this->Adopters->get($id, [
            'contain' => ['Tags', 'CatHistories', 'CatHistories.Cats']
        ]);
        
        $this->set('adopter', $adopter);
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adopter = $this->Adopters->newEntity();
        if ($this->request->is('post')) {
            $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
            $adopter['is_deleted'] = 0;
            $adopter['cat_count'] = 0;
            if (!$adopter['do_not_adopt']) {
              $adopter['dna_reason'] = NULL;
            }
            if ($this->Adopters->save($adopter)) {
                $this->Flash->success(__('The adopter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The adopter could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Adopters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('adopter', 'tags'));
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adopter = $this->Adopters->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
            if ($this->Adopters->save($adopter)) {
                $this->Flash->success(__('The adopter has been saved.'));

                return $this->redirect(['action' => 'view', $adopter->id]);
            } else {
                $this->Flash->error(__('The adopter could not be saved. Please, try again.'));
            }
        }
        $tags = $this->Adopters->Tags->find('list', ['limit' => 200]);
        $this->set(compact('adopter', 'tags'));
        $this->set('_serialize', ['adopter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adopter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $adopter = $this->Adopters->get($id);
        $this->request->data['is_deleted'] = 1;
        $adopter = $this->Adopters->patchEntity($adopter, $this->request->data);
        if ($this->Adopters->save($adopter)) {

			$cat_histories_table = TableRegistry::get('CatHistories');
			$associations = $cat_histories_table->query();
			$associations->update()
				->set(['end_date'=>date('Y-m-d')])
				->where(['adopter_id'=>$id])
				->andWhere(["end_date IS NULL"])
				->execute();

            $this->Flash->success(__('The adopter has been deleted.'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The adopter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
	}

	public function checkAssociations($adopter_id){
		$this->autoRender = false;
		$cat_histories_table = TableRegistry::get('CatHistories');
		$associations = $cat_histories_table->findByAdopterId($adopter_id);
		$associations->where(["end_date IS NULL"]);

		ob_clean();
		echo empty($associations->toArray()) ? '0' : '1';
		exit(0);
	}
}
