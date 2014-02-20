<?php

class BaseController extends Controller {

	public $model;
	public $modelName;
	public $modelNameSingularLowerCase;
	public $modelNamePluralLowerCase;
	public $pageHeading;
	public $paginateQuantity = 20;

	public function __construct(){

		if(empty($this->modelName)){

			$this->modelName = str_replace('Controller', '', get_called_class());
		}

		$this->model = new $this->modelName();

		$this->modelNameSingularLowerCase = strtolower($this->modelName);
		$this->modelNamePluralLowerCase = str_plural(strtolower($this->modelName));
	}

	protected function getSplitAtCaps($str){

		$pieces = preg_split('/(?=[A-Z])/',$str);
		$returnsStr = '';

		foreach ($pieces as $piece) {
			

			$returnsStr .= $piece. ' ';
		}

		return trim($returnsStr);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$this->setupGrid();
		Grid::generateList($this->model, $this->paginateQuantity);
		return View::make($this->modelNamePluralLowerCase . '.index', array('pageHeading' => empty($this->pageHeading) ? $this->getSplitAtCaps(str_plural($this->modelName)) : $this->pageHeading ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$this->modelSpecificSteps('getCreate');

		$instance = new $this->modelName();

		return View::make($this->modelNamePluralLowerCase . '.create', compact('instance'), array('pageHeading' => empty($this->pageHeading) ? str_plural($this->modelName) : $this->pageHeading ));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore()
	{

		$instance = new $this->modelName();

		if(!$instance->save()){

			return Redirect::to(URL::action(get_called_class().'@getCreate'))->withErrors($instance->errors());
		}

		return Redirect::to(URL::action(get_called_class().'@getIndex'))->with('message', 'A new ' . $this->getSplitAtCaps($this->modelName) . ' has been created.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{
		$this->modelSpecificSteps('getEdit');

		$instance = new $this->modelName;

		$instance = $instance->find($id);

		return View::make($this->modelNamePluralLowerCase . '.create', compact('instance'), array('pageHeading' => empty($this->pageHeading) ? str_plural($this->modelName) : $this->pageHeading ));
	}

	public function postUpdate($id){

		$instance = $this->model->find($id);
		$instance->fill(Input::all());

		//dd($instance);

		if(!$instance->updateUniques()){

			return Redirect::to('/admin/'.$this->modelNamePluralLowerCase.'/edit/'.$id)->withErrors($instance->errors());
		}

		return Redirect::to(URL::action(get_called_class().'@getIndex'))->with('message', 'An existing ' . $this->getSplitAtCaps($this->modelName) . ' has been updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getDestroy($id)
	{
		$instance = $this->model->find($id);
		$instance->delete();

		return Redirect::to(URL::action(get_called_class().'@getIndex'))->with('message', 'An existing ' . $this->getSplitAtCaps($this->modelName) . ' has been deleted.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id)
	{
		//$item = Customer::find($id);
		$item = $this->model->find($id);
		return View::make($this->modelNamePluralLowerCase . '.create', $id);
	}

	public function getToggleEnable()
	{
		$id = Input::get('id');
		$column = Input::get('column');

		$instance = $this->model->find($id);

		//dd($instance);

		$instance->$column = $instance->$column ? 0 : 1;
		$text = $instance->$column ? 'enabled' : 'disabled';

		$instance->save();

		return Redirect::to(URL::action(get_called_class().'@getIndex'))->with('message', 'An existing ' . $this->getSplitAtCaps($this->modelName) . ' has been ' . $text . '.');
	}

	public function modelSpecificSteps($action, $params = array()){

		return true;
	}

	public function postChangeOrder(){

		return true;
	}

}