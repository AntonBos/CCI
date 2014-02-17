<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('frontend.home');
});

Route::get('login', function()
{
	return View::make('frontend.login');
});

Route::post('login', function()
{
	try
	{
	    // Set login credentials
	    $credentials = array(
	        'email'    => Input::get('email'),
	        'password' => Input::get('password'),
	    );

	    // Try to authenticate the user
	    $user = Sentry::authenticate($credentials, false);

	    $admin_group = Sentry::findGroupByName('admins');
	    	
	    if ($user->inGroup($admin_group))
	    {
	    	return Redirect::to('/admin/home');
		}

		Sentry::logout();

		$message = 'Not an admin user';
	}

	catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
	{
	    $message = 'Login field is required.';
	}
	catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
	{
	    $message = 'Password field is required.';
	}
	catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
	{
	    $message = 'Wrong password, try again.';
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
	    $message = 'User was not found.';
	}
	catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
	{
	    $message = 'User is not activated.';
	}

	return Redirect::to('/login')->with('message', $message)->withInput(Input::except('password'));
});

Route::get('/logout', function(){

	Sentry::logout();
	return Redirect::to('/')->with('message', 'Logged Out');

});

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function()
{

	Route::get('home', function(){

		return View::make('admin.home');
	});

	Route::controller('users', 'UserController');
	Route::controller('about-pages', 'AboutController');
	Route::controller('services', 'ServiceController');
	//Route::controller('content-areas', 'ContentAreaController');
});