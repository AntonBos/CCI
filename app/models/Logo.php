<?php

use LaravelBook\Ardent\Ardent;

class Logo extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'logos';

	protected $guarded = array('id');
	public $forceEntityHydrationFromInput = true;
    public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
		'order_by' => 'required',
		'filename' => 'required'
    );

    public function __construct()
    {
        parent::__construct();

        $this->purgeFilters[] = function($key) {
            $keep = array('filename', 'order_by', 'created_at', 'updated_at');
            return in_array($key, $keep);
        };
    }

	public static function boot()
    {
        parent::boot();

        Logo::saving(function($logo)
        {
        	self::uploadImage($logo);

        	return true;
        });
    }

    public static function uploadImage($logo){

		if (Input::hasFile('filename')){

			$fileName = Input::file('filename')->getClientOriginalName();
			$path =  Input::file('filename')->move(public_path().'/logouploads', $fileName)->getRealPath();
			$logo->filename = '/logouploads/' . $fileName;
		}

    	return true;
	}
}