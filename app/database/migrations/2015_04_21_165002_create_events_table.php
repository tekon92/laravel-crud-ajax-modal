<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('category_id')->unsigned();

			$table->string('name', 255);
			$table->text('description');
			$table->mediumText('location');

			$table->datetime('started_at');
			$table->datetime('ended_at');

			$table->foreign('category_id')->references('id')->on('event_categories');
			$table->foreign('user_id')->references('id')->on('users');

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
		Schema::drop('events');
	}

}
