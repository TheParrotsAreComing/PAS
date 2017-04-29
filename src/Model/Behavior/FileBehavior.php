<?php 
namespace App\Model\Behavior;  

use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class FileBehavior extends Behavior {

	public function initialize(array $config) {
		// Some initialization code here 	
	}

	public function getEntityTypeId(){
		switch ($this->_table->registryAlias()) {
			case 'Cats':
				return 1;
			case 'Litters':
				return 2;
			case 'Adopters':
				return 3;
			case 'Fosters':
				return 4;
			case 'System':
				return 5;
			case 'Contacts':
				return 6;
			case 'CatMedicalHistories':
				return 7;
			case 'Users':
				return 8;
			default:
				break;
		}
	}

	public function uploadPhoto(string $fileName, string $tempLocation, string $extension, string $filePath, 
		int $entityTypeId, int $entityId, string $mimeType, int $fileSize){
		
		$filesDB = TableRegistry::get('Files');

		$uniqueName = Text::uuid();

		// make the folder!
		if (!file_exists(WWW_ROOT.$filePath)) {
 		   mkdir(WWW_ROOT.$filePath, 0777, true);
		}

		if(move_uploaded_file($tempLocation, WWW_ROOT.$filePath.'/'.$uniqueName.'.'.$extension)){

			// make a thumbnail too, append _tn to filename
		    $im = new \imagick();
		    $im->setResolution(400,300);
		    $im->readImage(WWW_ROOT.$filePath.'/'.$uniqueName.'.'.$extension);
		    $im->setImageBackgroundColor('white');
		    $im->scaleImage('200','200', true);
		    $im->setImageFormat('jpg');
		    $im->writeImage(WWW_ROOT.$filePath.'/'.$uniqueName.'_tn.'.$extension);
		    $im->clear();
		    $im->destroy();




			$new_photo = $filesDB->newEntity();
			$new_photo->entity_type = $entityTypeId;
	        $new_photo->entity_id = $entityId;
	        $new_photo->original_filename = $fileName;
	        $new_photo->is_photo = true;
	        $new_photo->mime_type = $mimeType;
	        $new_photo->file_size = $fileSize;
	        $new_photo->file_path = $filePath.'/'.$uniqueName;
	        $new_photo->file_ext = $extension;
	        $new_photo->created = date("Y-m-d H:i:s");
	        $new_photo->is_deleted = false;

	        if ($filesDB->save($new_photo)) {
                return $new_photo->id;
            } else {
            	return 0;
            }
        }

        return 0;

	}

	public function uploadDocument(string $fileName, string $tempLocation, string $extension, string $filePath, int $entityTypeId, int $entityId, string $mimeType, int $fileSize) {
		$filesDB = TableRegistry::get('Files');
		$uniqueName = Text::uuid();

		if (!file_exists(WWW_ROOT.$filePath)) {
			mkdir(WWW_ROOT.$filePath, 0777, true);
		}

		if(move_uploaded_file($tempLocation, WWW_ROOT.$filePath.'/'.$uniqueName.'.'.$extension)){
			$new_document = $filesDB->newEntity();
			$new_document->original_filename = $fileName;
			$new_document->entity_type = $entityTypeId;
			$new_document->entity_id = $entityId;
			$new_document->is_photo = false;
			$new_document->mime_type = $mimeType;
			$new_document->file_size = $fileSize;
			$new_document->file_path = $filePath.'/'.$uniqueName;
			$new_document->file_ext = $extension;
			$new_document->created = date("Y-m-d H:i:s");
			$new_document->is_deleted = false;

			if ($filesDB->save($new_document)) {
				return $new_document->id;
			} else {
				return 0;
			}
		}
		return 0;
	}
}