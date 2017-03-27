<?php 
namespace App\Model\Behavior;  
use Cake\ORM\Behavior;  
class FileBehavior extends Behavior {  	
	public function initialize(array $config) 	{ 		
		// Some initialization code here 	
	} 	

	public function checker(){
		debug("I'm HERE!"); 	
	} 
}