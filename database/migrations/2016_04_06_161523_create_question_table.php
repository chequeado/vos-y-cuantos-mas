<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 100);
			$table->string('description', 200)->nullable();
			$table->integer('answer_type_id')->unsigned()->index('question_answer_type_idx');
			$table->integer('category_id')->unsigned()->index('question_category_idx');
			$table->string('answer_link', 100)->nullable();
			$table->string('answer_title', 100);
			$table->string('answer_description', 200)->nullable();
			$table->string('answer_icon', 100)->nullable();
			$table->string('answer_chart', 100)->nullable();
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
		Schema::drop('question');
	}

}
