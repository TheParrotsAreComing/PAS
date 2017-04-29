<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdoptionEvents Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Cats
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\AdoptionEvent get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdoptionEvent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdoptionEvent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdoptionEvent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdoptionEvent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdoptionEvent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdoptionEvent findOrCreate($search, callable $callback = null, $options = [])
 */
class AdoptionEventsTable extends Table
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

        $this->table('adoption_events');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Cats', [
            'foreignKey' => 'adoption_event_id',
            'targetForeignKey' => 'cat_id',
            'joinTable' => 'cats_adoption_events'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'adoption_event_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_adoption_events'
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

        $validator
            ->date('event_date')
            ->requirePresence('event_date', 'create')
            ->notEmpty('event_date');

        $validator
            ->allowEmpty('description');

        $validator
            ->boolean('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

        return $validator;
    }
}
