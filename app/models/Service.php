<?php

use LaravelBook\Ardent\Ardent;

class Service extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'services';

	protected $guarded = array('id');
	public $forceEntityHydrationFromInput = true;
    public $autoPurgeRedundantAttributes = true;

	public static $rules = array(
		'description' => 'required',
		'name' => 'required'
    );

    public function __construct()
    {
        parent::__construct();

        $this->purgeFilters[] = function($key) {
            $keep = array('service_id', 'name', 'hero_image', 'description', 'enabled', 'created_at', 'updated_at');
            return in_array($key, $keep);
        };
    }

	public function services(){

		return $this->has('Service');
	}

	public function service(){

		return $this->belongsTo('Service');
	}

	public static function boot()
    {
        parent::boot();

        Service::creating(function($service)
        {
        	return self::uploadImage($service);
        });

        Service::updating(function($service)
        {
        	return self::uploadImage($service);
        });
    }

    public static function uploadImage($service){

		if (Input::hasFile('hero_image')){

			$fileName = Input::file('hero_image')->getClientOriginalName();
			$path =  Input::file('hero_image')->move(public_path().'/imageuploads', $fileName)->getRealPath();
			$service->hero_image = '/imageuploads/' . $fileName;
		}

    	return true;
	}
}