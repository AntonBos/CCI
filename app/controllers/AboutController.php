<?php

class AboutController extends \BaseController {

	protected function setupGrid(){
		
		Grid::setColumn('name', array('columnName' => 'Name'));
	}

	public function modelSpecificSteps($action, $params = array()){

		Basset::collection('Admin', function($collection)
        {
            $collection->add('/js/tinymce/js/tinymce/tinymce.min.js');
            $collection->add('/js/createAbout.js');
        });
	}
}