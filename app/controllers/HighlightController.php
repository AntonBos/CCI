<?php

class HighlightController extends \BaseController {

	protected function setupGrid(){
		
		Grid::setColumn('name', array('columnName' => 'Name'));
		//Grid::setEnable('enabled');
	}

	public function modelSpecificSteps($action, $params = array()){

		Basset::collection('Admin', function($collection)
        {
            $collection->add('/js/tinymce/js/tinymce/tinymce.min.js');
            $collection->add('/js/createHighlight.js');
            $collection->add('/js/bootstrap-datepicker.js');
        });
	}
}