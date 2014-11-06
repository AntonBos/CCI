<?php

class UserController extends \BaseController {

	protected function setupGrid(){

		Grid::setColumn('first_name', array('columnName' => 'Name'));
		Grid::setColumn('last_name', array('columnName' => 'Surname'));
		Grid::setColumn('email', array('columnName' => 'email'));

		//Grid::setEnable('activated');
	}

	public function postStore()
	{
		$instance = new User();

		$instance->validate();

		$errors = $instance->errors()->all();

		if(!empty($errors)){

			return Redirect::to('/admin/users/create')->withErrors($instance->errors());
		}

		$userGroup = Sentry::findGroupByName('Admins');

		$sentryUser = array(
			'email' => $instance->email,
			'password' => $instance->password,
			'activated' => 1,
			'first_name' => $instance->first_name,
			'last_name' => $instance->last_name
		);

		$createdUser = Sentry::register($sentryUser);
        $createdUser->addGroup($userGroup);

		return Redirect::to(URL::action(get_called_class().'@getIndex'))->with('message', 'A new User has been created.');
	}

	public function postUpdate($id){

		$instance = Sentry::findUserById($id);

		//$instance = $this->model->find($id);
		//$instance->fill(Input::all());
		$instance->email = Input::get('email');
		$instance->password = Input::get('password');
		$instance->first_name = Input::get('first_name');
		$instance->last_name = Input::get('last_name');

		if(!$instance->save()){

			return Redirect::to('/admin/'.$this->modelNamePluralLowerCase.'/edit/'.$id)->withErrors($instance->errors());
		}

		return Redirect::to(URL::action(get_called_class().'@getIndex'))->with('message', 'An existing ' . $this->getSplitAtCaps($this->modelName) . ' has been updated.');
	}
}