<?php 
namespace App\Model\Behavior;  

use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class FilterableTagBehavior extends Behavior {

	public function initialize(array $config) {
		// Some initialization code here 	
	}

	public function buildFilterArray($query){
		switch ($this->_table->registryAlias()) {
			case 'Cats':
				$table = 'Tags_Cats';
				$valueField = 'cat_id';
				break;
			case 'Adopters':
				$table = 'Tags_Adopters';
				$valueField = 'adopter_id';
				break;
			case 'Fosters':
				$table = 'Tags_Fosters';
				$valueField = 'foster_id';
				break;
			default:
				return [];
		}

		foreach($query as $i => $e){
			$query[$i] = (int)$e;
		}

		$attached_tags = TableRegistry::get($table)->find('list', ['keyField'=>'id','valueField'=>$valueField])->where(['tag_id IN'=>$query])->toArray();

		$count_arr = [];

		foreach($attached_tags as $i => $e){
			if(empty($count_arr[$e])){
				$count_arr[$e] = 1;
			}else{
				$count_arr[$e]++;
			}
		}

		$tag_count = count($query);

		foreach($count_arr as $i => $e){
			if($e != $tag_count){
				unset($count_arr[$i]);
			}
		}

		return array_keys($count_arr);
	}

}
