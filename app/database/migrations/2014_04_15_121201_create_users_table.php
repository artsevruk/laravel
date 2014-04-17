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
		Schema::create('users', function ($table){
			$table->increments('id') ->unsigned();
			$table->string('email') ->nullable() ->default(null);
			$table->string('username') ->nullable() ->default(null);
			$table->string('password') ->nullable() ->default(null);
			$table->string('password_temp') ->nullable() ->default(null);
			$table->string('code')->nullable() ->default(null);
			$table->integer('active');
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
