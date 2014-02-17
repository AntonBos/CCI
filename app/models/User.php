<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $guarded = array('id');
	public $forceEntityHydrationFromInput = true;
	public $autoPurgeRedundantAttributes = true;
	//public $autoHydrateEntityFromInput = true;

	public static $rules = array(
    	'email' => 'required|email|unique:users',
    	'first_name' => 'required',
    	'last_name' => 'required',
    	'password' => 'required|between:6,20|confirmed',
    	'password_confirmation' => 'required|between:6,20'
    );

    public function __construct()
    {
        parent::__construct();

        $this->purgeFilters[] = function($key) {
            $purge = array('password_confirmation', 'submit');
            return ! in_array($key, $purge);
        };
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public static function setRule($name, $value){

		self::$rules[$name] = $value;
	}

	public static function unsetRule($name){

		unset(self::$rules[$name]);
	}
}