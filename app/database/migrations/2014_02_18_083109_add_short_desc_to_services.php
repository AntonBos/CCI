<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShortDescToServices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('services', function($table)
		{
		    $table->text('short_description')->nullable();
		});

		Schema::table('content_areas', function($table)
		{
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('services', function($table)
		{
		    $table->dropColumn('short_description');
		});
	}

}
