<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ol_quotes', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('quote');
            $t->string('author');
            $t->string('image');
            $t->timestamps();
            $t->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('ol_quotes');
	}

}
