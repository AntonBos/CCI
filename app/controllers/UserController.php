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
}