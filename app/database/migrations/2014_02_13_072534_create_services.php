<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function($table)
		{
		    $table->increments('id');
		    $table->integer('service_id')->nullable();
		    $table->string('name');
		    $table->string('hero_image');
		    $table->text('description');
		    $table->string('order_by');
		    $table->boolean('enabled');
		    $table->timestamps();
		});

		Schema::create('abouts', function($table)
		{
		    $table->increments('id');
		    $table->integer('about_id')->nullable();
		    $table->string('name');
		    $table->string('hero_image');
		    $table->text('description');
		    $table->string('order_by');
		    $table->boolean('enabled');
		    $table->timestamps();
		});

		Schema::create('highlights', function($table)
		{
		    $table->increments('id');
		    $table->string('name');
		    $table->date('date');
		    $table->text('description');
		    $table->boolean('enabled');
		    $table->timestamps();
		});

		Schema::create('content_areas', function($table){

			$table->increments('id');
		    $table->string('name');
		    $table->text('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('services');
		Schema::dropIfExists('abouts');
		Schema::dropIfExists('highlights');
		Schema::dropIfExists('content_areas');
	}

}
