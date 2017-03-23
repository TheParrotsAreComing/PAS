<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tags Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Adopters
 * @property \Cake\ORM\Association\BelongsToMany $Cats
 * @property \Cake\ORM\Association\BelongsToMany $Fosters
 *
 * @method \App\Model\Entity\Tag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tag findOrCreate($search, callable $callback = null, $options = [])
 */
class TagsTable extends Table
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

        $this->table('tags');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Adopters', [
            'foreignKey' => 'tag_id',
            'targetForeignKey' => 'adopter_id',
            'joinTable' => 'tags_adopters'
        ]);
        $this->belongsToMany('Cats', [
            'foreignKey' => 'tag_id',
            'targetForeignKey' => 'cat_id',
            'joinTable' => 'tags_cats'
        ]);
        $this->belongsToMany('Fosters', [
            'foreignKey' => 'tag_id',
            'targetForeignKey' => 'foster_id',
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
            ->allowEmpty('label');

        $validator
            ->allowEmpty('color');

        $validator
            ->integer('type_bit')
            ->allowEmpty('type_bit');

        $validator
            ->boolean('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

        return $validator;
    }
}
