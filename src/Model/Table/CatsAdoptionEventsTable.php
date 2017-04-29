<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatsAdoptionEvents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cats
 * @property \Cake\ORM\Association\BelongsTo $AdoptionEvents
 *
 * @method \App\Model\Entity\CatsAdoptionEvent get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatsAdoptionEvent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatsAdoptionEvent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatsAdoptionEvent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatsAdoptionEvent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatsAdoptionEvent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatsAdoptionEvent findOrCreate($search, callable $callback = null, $options = [])
 */
class CatsAdoptionEventsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('cats_adoption_events');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Cats', [
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('AdoptionEvents', [
            'foreignKey' => 'adoption_event_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cat_id'], 'Cats'));
        $rules->add($rules->existsIn(['adoption_event_id'], 'AdoptionEvents'));

        return $rules;
    }
}
