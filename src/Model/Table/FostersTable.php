<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fosters Model
 *
 * @property \Cake\ORM\Association\HasMany $CatHistories
 * @property \Cake\ORM\Association\HasMany $Cats
 * @property \Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Foster get($primaryKey, $options = [])
 * @method \App\Model\Entity\Foster newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Foster[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Foster|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Foster patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Foster[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Foster findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FostersTable extends Table
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

        $this->table('fosters');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CatHistories', [
            'foreignKey' => 'foster_id'
        ]);
        $this->hasMany('Cats', [
            'foreignKey' => 'foster_id'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'foster_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'tags_fosters'
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('exp');

        $validator
            ->allowEmpty('pets');

        $validator
            ->allowEmpty('kids');

        $validator
            ->allowEmpty('avail');

        $validator
            ->integer('rating')
            ->allowEmpty('rating');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}