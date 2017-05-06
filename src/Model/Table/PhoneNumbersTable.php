<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PhoneNumbers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Entities
 *
 * @method \App\Model\Entity\PhoneNumber get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhoneNumber newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PhoneNumber[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhoneNumber|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhoneNumber patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhoneNumber[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhoneNumber findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PhoneNumbersTable extends Table
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

        $this->table('phone_numbers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fosters', [
            'foreignKey' => 'entity_id'
        ]);

        $this->belongsTo('Adopters', [
            'foreignKey' => 'entity_id'
        ]);

        $this->belongsTo('Contacts', [
            'foreignKey' => 'entity_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'entity_id'
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
            ->requirePresence('entity_id')
            ->allowEmpty('entity_id');

        $validator
            ->requirePresence('phone_type')
            ->notEmpty('phone_type');

        $validator
            ->integer('entity_type')
            ->notEmpty('entity_type');

        $validator
            ->requirePresence('phone_num', 'create')
            ->integer('phone_num')
            ->add('phone_num',[
                'length' => [
                'rule' => [ 
                'minLength', 10],
                'message' => 'Phone number must be 10 digits long']
            ])
            ->notEmpty('phone_type');

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
        $rules->add($rules->existsIn(['id'], 'Fosters'));
        $rules->add($rules->existsIn(['id'], 'Adopters'));
        $rules->add($rules->existsIn(['id'], 'Contacts'));
        $rules->add($rules->existsIn(['id'], 'Users'));
        return $rules;
    }
}
