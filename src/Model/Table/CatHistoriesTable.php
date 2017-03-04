<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatHistories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cats
 * @property \Cake\ORM\Association\BelongsTo $Adopters
 * @property \Cake\ORM\Association\BelongsTo $Fosters
 *
 * @method \App\Model\Entity\CatHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatHistory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class CatHistoriesTable extends Table
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

        $this->table('cat_histories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Cats', [
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Adopters', [
            'foreignKey' => 'adopter_id'
        ]);
        $this->belongsTo('Fosters', [
            'foreignKey' => 'foster_id'
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
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

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
        $rules->add($rules->existsIn(['adopter_id'], 'Adopters'));
        $rules->add($rules->existsIn(['foster_id'], 'Fosters'));

        return $rules;
    }
}
