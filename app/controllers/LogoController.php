<?php

class LogoController extends \BaseController {

	protected function setupGrid(){
		
		Grid::setColumn('filename', array('columnName' => 'File Name'));
		Grid::setOrderBy('order_by');
	}

	/*public function modelSpecificSteps($action, $params = array()){

		Basset::collection('Admin', function($collection)
        {
            $collection->add('/js/tinymce/js/tinymce/tinymce.min.js');
            $collection->add('/js/createAbout.js');
        });
	}*/
}