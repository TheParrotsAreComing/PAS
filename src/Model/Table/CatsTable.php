<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cats Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Litters
 * @property \Cake\ORM\Association\BelongsTo $Adopters
 * @property \Cake\ORM\Association\BelongsTo $Fosters
 * @property \Cake\ORM\Association\BelongsTo $Files
 * @property \Cake\ORM\Association\HasMany $CatHistories
 * @property \Cake\ORM\Association\BelongsToMany $AdoptionEvents
 * @property \Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Cat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cat findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\CounterCacheBehavior
 */
class CatsTable extends Table
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

        $this->table('cats');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', ['Litters' => ['cat_count'], 'Adopters' => ['cat_count']]);

        $this->belongsTo('Litters', [
            'foreignKey' => 'litter_id'
        ]);
        $this->belongsTo('Adopters', [
            'foreignKey' => 'adopter_id'
        ]);
        $this->belongsTo('Fosters', [
            'foreignKey' => 'foster_id'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'profile_pic_file_id'
        ]);
        $this->hasMany('CatHistories', [
            'foreignKey' => 'cat_id'
        ]);
        $this->belongsToMany('AdoptionEvents', [
            'foreignKey' => 'cat_id',
            'targetForeignKey' => 'adoption_event_id',
            'joinTable' => 'cats_adoption_events'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'cat_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'tags_cats'
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
            ->requirePresence('cat_name', 'create')
            ->notEmpty('cat_name');

        $validator
            ->requirePresence('is_kitten', 'create')
            ->notEmpty('is_kitten');

        $validator
            ->date('dob')
            ->requirePresence('dob', 'create')
            ->notEmpty('dob');

        $validator
            ->requirePresence('is_female', 'create')
            ->notEmpty('is_female');

        $validator
            ->requirePresence('breed', 'create')
            ->notEmpty('breed');

        $validator
            ->allowEmpty('bio');

        $validator
            ->allowEmpty('caretaker_notes');

        $validator
            ->allowEmpty('medical_notes');

        $validator
            ->integer('microchip_number')
            ->allowEmpty('microchip_number');

        $validator
            ->date('microchiped_date')
            ->allowEmpty('microchiped_date');

        $validator
            ->boolean('adoption_fee_paid')
            ->allowEmpty('adoption_fee_paid');

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
        $rules->add($rules->existsIn(['litter_id'], 'Litters'));
        $rules->add($rules->existsIn(['adopter_id'], 'Adopters'));
        $rules->add($rules->existsIn(['foster_id'], 'Fosters'));
        $rules->add($rules->existsIn(['profile_pic_file_id'], 'Files'));

        return $rules;
    }
}