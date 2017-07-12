<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatMedicalHistories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cats
 *
 * @method \App\Model\Entity\CatMedicalHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatMedicalHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatMedicalHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatMedicalHistory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatMedicalHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatMedicalHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatMedicalHistory findOrCreate($search, callable $callback = null, $options = [])
 */


class CatMedicalHistoriesTable extends Table
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

        $this->table('cat_medical_histories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('File');

        $this->belongsTo('Cats', [
            'foreignKey' => 'cat_id',
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

        $validator
            ->boolean('is_fvrcp')
            ->allowEmpty('is_fvrcp');

        $validator
            ->boolean('is_deworm')
            ->allowEmpty('is_deworm');

        $validator
            ->boolean('is_flea')
            ->allowEmpty('is_flea');

        $validator
            ->boolean('is_rabies')
            ->allowEmpty('is_rabies');

        $validator
            ->boolean('is_other')
            ->allowEmpty('is_other');

        $validator
            ->date('administered_date')
            ->requirePresence('administered_date', 'create')
            ->notEmpty('administered_date');

        $validator
            ->allowEmpty('notes');

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

        return $rules;
    }

    public function formatForPrint($cat_id) {
        $formatted = [];
        $unformatted = $this->find('all')
            ->where(['cat_id'=>$cat_id])
            ->contain('Cats')
            ->toArray();
        foreach ($unformatted as $item) {
            $date = $item['administered_date']->__toString();

            if ($item['is_fvrcp']) {
                $formatted['fvrcp'][] = $date;
                continue;
            } else if ($item['is_deworm']) {
                $formatted['deworm'][] = $date;
                continue;
            } else if ($item['is_flea']) {
                $formatted['flea'][] = $date;
                continue;
            } else if ($item['is_rabies']) {
                $formatted['rabies'][] = $date;
                continue;
            } else if ($item['is_other']) {
                $formatted['other'][] = $date;
                continue;
            }
        }

        $formatted['spay_neuter'] = "";
        $formatted['felv_fiv'] = "";
        $formatted['microchip'] = $item['cat']['microchip_number'];
        $formatted['registered'] = "";
        $formatted['cat'] = $item['cat'];
        $formatted['cat']['gender'] = ($item['cat']['is_female']) ? 'Female' : 'Male';
        $formatted['cat']['dob'] = $item['cat']['dob']->__toString();

        return $formatted;
    }
}
