<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
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
        $formatted = ['spay'=>[], 'neuter'=>[], 'fvrcp'=>[], 'deworm'=>[], 'flea'=>[], 'rabies'=>[], 'blood'=>[], 'other'=>[], 'note'=>'', 'next_service'=>''];
        $unformatted = $this->find('all')
            ->where(['cat_id'=>$cat_id])
            ->contain('Cats')
            ->toArray();

        foreach ($unformatted as $item) {
            $date = $item['administered_date']->__toString();

            if ($item['is_fvrcp']) {
                $formatted['fvrcp'][] = $item['administered_date'];
                continue;
            } else if ($item['is_deworm']) {
                $formatted['deworm'][] = $item['administered_date'];
                continue;
            } else if ($item['is_flea']) {
                $formatted['flea'][] = $item['administered_date'];
                continue;
            } else if ($item['is_rabies']) {
                $formatted['rabies'][] = $item['administered_date'];
                continue;
            } else if ($item['is_other']) {
                $formatted['other'][] = ['date'=>$item['administered_date'], 'notes'=>$item['notes']];
                continue;
            } else if ($item['is_blood']) {
                $formatted['blood'][] = $item['administered_date'];
                continue;
            } else if ($item['is_spay']) {
                $formatted['spay'] = $item['administered_date'];
                continue;
            } else if ($item['is_neuter']) {
                $formatted['neuter'] = $item['administered_date'];
                continue;
            } else if ($item['is_note']) {
                $formatted['note'] = ['date'=>$item['administered_date'], 'notes'=>$item['notes']];
            } else if ($item['is_next_service']) {
                $formatted['next_service'] = ['date'=>$item['administered_date'], 'notes'=>$item['notes']];
                continue;
            }
        }

        if (empty($unformatted)) {
            $item['cat'] = TableRegistry::get('Cats')->find('all')
                ->where(['id'=>$cat_id])
                ->first();
        }

        sort($formatted['fvrcp']);
        $formatted['fvrcp'] = array_pad(array_slice($formatted['fvrcp'], -6, 6), 6, "");
        sort($formatted['deworm']);
        $formatted['deworm'] = array_pad(array_slice($formatted['deworm'], -6, 6), 6, "");
        sort($formatted['flea']);
        $formatted['flea'] = array_pad(array_slice($formatted['flea'], -6, 6), 6, "");
        sort($formatted['rabies']);
        $formatted['rabies'] = array_pad(array_slice($formatted['rabies'], -6, 6), 6, "");
        sort($formatted['other']);
        $formatted['other'] = array_pad(array_slice($formatted['other'], -6, 6), 6, "");

        $formatted['microchip'] = $item['cat']['microchip_number'];
        $formatted['registered'] = "";
        $formatted['cat'] = $item['cat'];
        $formatted['cat']['gender'] = ($item['cat']['is_female']) ? 'Female' : 'Male';
        $formatted['cat']['dob'] = $item['cat']['dob']->__toString();

        return $formatted;
    }
}
