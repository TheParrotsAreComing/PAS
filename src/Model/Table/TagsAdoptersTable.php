<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TagsAdopters Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tags
 * @property \Cake\ORM\Association\BelongsTo $Adopters
 *
 * @method \App\Model\Entity\TagsAdopter get($primaryKey, $options = [])
 * @method \App\Model\Entity\TagsAdopter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TagsAdopter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TagsAdopter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TagsAdopter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TagsAdopter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TagsAdopter findOrCreate($search, callable $callback = null, $options = [])
 */
class TagsAdoptersTable extends Table
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

        $this->table('tags_adopters');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Adopters', [
            'foreignKey' => 'adopter_id',
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
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        $rules->add($rules->existsIn(['adopter_id'], 'Adopters'));

        return $rules;
    }
}
