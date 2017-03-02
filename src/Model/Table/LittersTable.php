<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Litters Model
 *
 * @property \Cake\ORM\Association\BelongsTo $KcReves
 * @property \Cake\ORM\Association\HasMany $Cats
 *
 * @method \App\Model\Entity\Litter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Litter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Litter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Litter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Litter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Litter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Litter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LittersTable extends Table
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

        $this->table('litters');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cats', [
            'foreignKey' => 'litter_id'
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
            ->requirePresence('litter_name', 'create')
            ->notEmpty('litter_name');

        $validator
            ->integer('cat_count')
            ->requirePresence('cat_count', 'create')
            ->notEmpty('cat_count');

        $validator
            ->integer('kitten_count')
            ->requirePresence('kitten_count', 'create')
            ->notEmpty('kitten_count');

        $validator
            ->date('dob')
            ->allowEmpty('dob');

        $validator
            ->date('asn_start')
            ->allowEmpty('asn_start');

        $validator
            ->date('asn_end')
            ->allowEmpty('asn_end');

        $validator
            ->allowEmpty('est_arrival');

        $validator
            ->allowEmpty('breed');

        $validator
            ->allowEmpty('foster_notes');

        $validator
            ->allowEmpty('notes');

        $validator
            ->boolean('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

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
        return $rules;
    }
}
