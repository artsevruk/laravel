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
			$table->string('email', 50) ->nullable() ->default(null);
			$table->string('username', 20) ->nullable() ->default(null);
			$table->string('password', 60) ->nullable() ->default(null);
			$table->string('password_temp', 60) ->nullable() ->default(null);
			$table->string('code', 60)->nullable() ->default(null);
			$table->string('remember_token',100)->nullable() ->default(null);
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
