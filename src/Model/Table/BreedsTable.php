<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Breeds Model
 *
 * @property \Cake\ORM\Association\HasMany $Cats
 *
 * @method \App\Model\Entity\Breed get($primaryKey, $options = [])
 * @method \App\Model\Entity\Breed newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Breed[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Breed|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Breed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Breed[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Breed findOrCreate($search, callable $callback = null, $options = [])
 */
class BreedsTable extends Table
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

        $this->table('breeds');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Cats', [
            'foreignKey' => 'breed_id'
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
            ->allowEmpty('breed');

        return $validator;
    }
}
