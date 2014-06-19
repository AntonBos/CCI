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

Route::get('services/{service?}/{subService?}', function($service = false, $subService = false) {

	View::share('layoutAllTopLevelServices', Service::with('services')->isTopLevel()->orderBy('order_by', 'ASC')->get());
	$topLevelService = false;
	$subServices = false;
	$topLevelServiceSlug = false;
	$subServiceSlug = false;

	if(!$service){

		$content = ContentArea::where('slug', 'services')->where('type', 'Page')->first();

	}else if (!$subService){

		$content = Service::with('services')->where('slug', $service)->first();
		$topLevelService = $content;
		$subServices = $topLevelService->services;
		$topLevelServiceSlug = $service;

	}else{

		$topLevelService = Service::where('slug', $service)->first();

		$content = Service::where('slug', $subService)->where('service_id', $topLevelService->id)->first();
		
		$subServices = $topLevelService->services;
		$topLevelServiceSlug = $service;
		$subServiceSlug = $subService;
	}

	View::share('layoutTopLevelService', $topLevelService);
	View::share('layoutSubServices', $subServices);
	View::share('layoutTopLevelServiceSlug', $topLevelServiceSlug);
	View::share('layoutSubServiceSlug', $subServiceSlug);

    return View::make('services.view')->with('content', $content);
});

Route::get('about/{about?}', function($about = false){

	View::share('layoutAllAbouts', About::isEnabled()->orderBy('order_by', 'ASC')->get());
	$aboutSlug = false;

	if(!$about){

		$content = ContentArea::where('slug', 'about')->where('type', 'Page')->first();

	}else{

		$content = About::where('slug', $about)->first();

		$aboutSlug = $content->slug;
	}

	View::share('layoutAboutSlug', $aboutSlug);

	return View::make('abouts.view')->with('content', $content);
});

Route::get('highlights/{highlight?}', function($highlight){

	$content = Highlight::where('slug', $highlight)->first();

	return View::make('highlights.view')->with('content', $content);
});

Route::get('black-empowerment', function(){

	$content = ContentArea::where('slug', 'black-empowerment')->first();
	return View::make('contentareas.view')->with('content', $content);
});

Route::get('news', function(){

	$highlights = Highlight::orderBy('created_at', 'DESC')->get();
	return View::make('highlights.list')->with('highlights', $highlights);
});

Route::get('contact', function(){

	return View::make('frontend.contact');
});

Route::get('test', function(){

	return View::make('frontend.test');
});

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function()
{

	Route::get('home', function(){

		return View::make('admin.home');
	});

	Route::controller('users', 'UserController');
	Route::controller('about-pages', 'AboutController');
	Route::controller('services', 'ServiceController');
	Route::controller('content-areas', 'ContentAreaController');
	Route::controller('highlights', 'HighlightController');
	Route::controller('logos', 'LogoController');
});