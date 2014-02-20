<?php

use LaravelBook\Ardent\Ardent;

class About extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'abouts';

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
            $keep = array('about_id', 'name', 'description', 'enabled', 'created_at', 'updated_at');
            return in_array($key, $keep);
        };
    }

	/*public function abouts(){

		return $this->has('About');
	}

	public function about(){

		return $this->belongsTo('About');
	}*/

	public static function boot()
    {
        parent::boot();

        About::saving(function($about)
        {
        	self::uploadImage($about);
        	self::createSlug($about);
        });
    }

    public static function uploadImage($about){

		if (Input::hasFile('hero_image')){

			$fileName = Input::file('hero_image')->getClientOriginalName();
			$path =  Input::file('hero_image')->move(public_path().'/imageuploads', $fileName)->getRealPath();
			$about->hero_image = '/imageuploads/' . $fileName;
		}

    	return true;
	}

	public static function createSlug($about){

		$about->slug = Str::slug($about->name);
		return true;
	}

	public static function scopeIsEnabled($query){

        return $query->whereEnabled('1');
    }
}