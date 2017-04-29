<?php 
namespace App\Model\Behavior;  

use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class FilterablePhoneBehavior extends Behavior {

	public function initialize(array $config) {
		// Some initialization code here 	
	}

	public function filterPhones($query){
		switch ($this->_table->registryAlias()) {
			case 'Fosters':
				$table = 'Phone_Numbers';
				$valueField = 'entity_id';
				$entityType = 0;
				break;
			case 'Adopters':
				$table = 'Phone_Numbers';
				$valueField = 'entity_id';
				$entityType = 1;
				break;
			case 'Contacts':
				$table = 'Phone_Numbers';
				$valueField = 'entity_id';
				$entityType = 2;
				break;
			default:
				return [];
		}

		$attached_phones = TableRegistry::get($table)->find('list', ['keyField'=>'entity_id','valueField'=>$valueField])->where(['phone_num IN'=>$query])->andWhere(['entity_type'=>$entityType])->toArray();

		$count_arr = [];

		foreach($attached_phones as $i => $e){
			if(empty($count_arr[$e])){
				$count_arr[$e] = 1;
			}else{
				$count_arr[$e]++;
			}
		}

		$phone_count = count($query);

		foreach($count_arr as $i => $e){
			if($e != $phone_count){
				unset($count_arr[$i]);
			}
		}

		return array_keys($count_arr);
	}
}