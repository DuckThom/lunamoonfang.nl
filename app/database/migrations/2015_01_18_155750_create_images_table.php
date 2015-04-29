<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('ID');	// INTEGER	: Autoincrement
			$table->string('Name', 100);	// VARCHAR(100) : Original image name
			$table->string('Hash', 8); 	// VARCHAR(8)	: Image hash used in url
			$table->timestamps();		// VARCHAR(40)	: updated_at & created_at
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
