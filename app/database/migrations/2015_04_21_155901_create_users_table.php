<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->string('username', 255)->unique();
			$table->string('password', 255);
			$table->string('email', 255)->unique();
			$table->dateTime('last_access')->nullable();
			$table->dateTime('pass_update')->nullable();
			$table->enum('status', ['y', 'n'])->default('n');
			$table->enum('active', ['y', 'n', 'd'])->default('n');
			$table->string('avatar', 255)->nullable();
			$table->string('cover', 255)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->string('sms_activation', 50)->nullable();
			$table->string('activation', 50)->nullable();
			$table->string('reflink', 50)->nullable();
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
