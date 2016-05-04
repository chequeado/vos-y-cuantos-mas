<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('option', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('question_id')->unsigned()->index('option_question_idx');
			$table->string('key', 100);
			$table->string('text', 100)->nullable();
			$table->integer('value')->nullable();
			$table->string('text_answer', 100)->nullable();
			$table->string('image_file', 100)->nullable();
			$table->string('icon', 100)->nullable();
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
		Schema::drop('option');
	}

}
