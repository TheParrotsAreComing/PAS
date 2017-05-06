<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\I18n\Time;

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
        $this->addBehavior('File');
        $this->addBehavior('FilterableTag');

        $this->belongsTo('Litters', [
            'foreignKey' => 'litter_id'
        ]);
        $this->belongsTo('Breeds', [
            'foreignKey' => 'breed_id'
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
        $this->hasMany('CatMedicalHistories', [
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
            ->requirePresence('breed_id', 'create')
            ->notEmpty('breed_id');

        $validator
            ->notEmpty('bio');

        $validator
            ->integer('microchip_number')
            ->allowEmpty('microchip_number');

        $validator
            ->boolean('is_microchip_registered')
            ->allowEmpty('is_microchip_registered');

        $validator
            ->allowEmpty('adoption_fee_amount');

        $validator
            ->integer('profile_pic_file_id')
            ->allowEmpty('profile_pic_file_id');

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

    public function attachToLitter($litter_id, $cat) {
        $litter_table = TableRegistry::get('Litters');
        $the_litter = $litter_table->get($litter_id);

		//Log::write('debug', printr($cat));
        if($cat['is_kitten']) {
            $the_litter->kitten_count++;
        }
        else {
            $the_litter->the_cat_count++;
        }

        $litter_table->save($the_litter);


    }

    public function getAAPUploadArray($cat_id, $data) {
        $query = $this->find()
            ->select(['id','breed_id','coat','cat_name','dob','is_female','bio','good_with_kids','good_with_dogs','good_with_cats','special_needs','needs_experienced_adopter',])
            ->where(['id'=>$cat_id]);
        $result = $query->first()->toArray();
        $result['Animal'] = 'Cat';
        $result['Sex'] = ($result['is_female']) ? 'F' : 'M';
        $result['breed'] = TableRegistry::get('Breeds')->find()->where(['id'=>$result['breed_id']])->first()->breed;

        if ($result['dob']->wasWithinLast('6 months')) {
            $result['Age'] = 'Kitten';
        } else if ($result['dob']->wasWithinLast('1 year')) {
            $result['Age'] = 'Young';
        } else if ($result['dob']->wasWithinLast('7 years')) {
            $result['Age'] = 'Adult';
        } else {
            $result['Age'] = 'Senior';
        }

        $result['Status'] = $data['status'];
        $result['Color'] = $data['aap_color'];
        $result['SpayedNeutered'] = (boolean) $data['SpayedNeutered'];
        $result['ShotsCurrent'] = (boolean) $data['ShotsCurrent'];
        $result['Declawed'] = (boolean) $data['Declawed'];
        $result['Housetrained'] = (boolean) $data['Housetrained'];
        $result['id'] = 'PAWS'.sprintf('%05d', $result['id']);

        unset($result['is_female']);
        unset($result['dob']);
        unset($result['breed_id']);
        $output = [];
        $output[] = array_keys($result);
        $output[] = array_values($result);
        return $output;
    }


	public function manualGroupMedicalHistories($histories){
		$is_fvrcp = [];
		$is_deworm = [];
		$is_flea = [];
		$is_rabies = [];
		$is_other = [];

		$segmented = [];

		foreach($histories as $history){
			if(!empty($history->is_fvrcp)) $is_fvrcp[] = $history;
			if(!empty($history->is_deworm)) $is_deworm[] = $history;
			if(!empty($history->is_flea)) $is_flea[] = $history;
			if(!empty($history->is_rabies)) $is_rabies[] = $history;
			if(!empty($history->is_other)) $is_other[] = $history;
		}
		
		$segmented['FVCRP'] = $is_fvrcp;
		$segmented['De-Worm'] = $is_deworm;
		$segmented['Flea'] = $is_flea;
		$segmented['Rabies'] = $is_rabies;
		$segmented['Other'] = $is_other;
		
		return $segmented;
	}
}
