<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Adopters Model
 *
 * @property \Cake\ORM\Association\HasMany $CatHistories
 * @property \Cake\ORM\Association\HasMany $Cats
 * @property \Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Adopter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Adopter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Adopter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Adopter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Adopter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Adopter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Adopter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdoptersTable extends Table
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

        $this->table('adopters');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('File');
        $this->addBehavior('FilterableTag');

        $this->hasMany('CatHistories', [
            'foreignKey' => 'adopter_id'
        ]);
        $this->hasMany('Cats', [
            'foreignKey' => 'adopter_id'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'adopter_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'tags_adopters'
        ]);
        $this->hasMany('PhoneNumbers', [
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->allowEmpty('last_name');

        $validator
            ->integer('cat_count')
            ->requirePresence('cat_count', 'create')
            ->allowEmpty('cat_count');

        $validator
            ->requirePresence('address', 'create')
            ->allowEmpty('address');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmpty('email');

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