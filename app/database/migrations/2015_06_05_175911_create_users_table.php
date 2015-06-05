<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 	40); 		// VARCHAR(40)  : First name
			$table->string('last_name', 	40);		// VARCHAR(40)  : Last name
			$table->string('username', 		20);		// VARCHAR(20)  : Username
			$table->string('password', 	   200);		// VARCHAR(200) : Password
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
