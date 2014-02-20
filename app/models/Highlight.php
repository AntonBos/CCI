<?php

use LaravelBook\Ardent\Ardent;

class Highlight extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'highlights';

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
            $keep = array('name', 'short_description', 'description', 'enabled', 'created_at', 'updated_at', 'date');
            return in_array($key, $keep);
        };
    }

	public static function boot()
    {
        parent::boot();

        Highlight::saving(function($highlight)
        {
        	self::uploadImage($highlight);
        	self::createSlug($highlight);

        	return true;
        });
    }

    public static function uploadImage($highlight){

		if (Input::hasFile('hero_image')){

			$fileName = Input::file('hero_image')->getClientOriginalName();
			$path =  Input::file('hero_image')->move(public_path().'/imageuploads', $fileName)->getRealPath();
			$highlight->hero_image = '/imageuploads/' . $fileName;
		}

    	return true;
	}

	public static function createSlug($highlight){

		$highlight->slug = Str::slug($highlight->name);
		return true;
	}

	public static function scopeIsEnabled($query){

        return $query->whereEnabled('1');
    }
}