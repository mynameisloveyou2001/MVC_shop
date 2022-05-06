<?php 
/**
 * 
 */
class BaseController
{

	const VIEW_FOLDER_NAME='Views';
	const MODEL_FOLDER_NAME='Models';
	const VIEWINC_FOLDER_NAME='inc';

	//path name: folderName.fileName.php, same laravell
	//lấy từ sau Views(từ frontend tới)

	protected function view($path,array $data = []){

		foreach ($data as $key => $value) {
			$$key = $value;
		}
		require_once './'.self::VIEW_FOLDER_NAME.'/'. str_replace('.', '/', $path).'.php';
	}



	// protected function vieworther()




	protected function loadModel($path){

		require_once  './'.self::MODEL_FOLDER_NAME.'/'. $path .'.php';

	}

}
?>