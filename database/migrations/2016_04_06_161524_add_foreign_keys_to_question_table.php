<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->foreign('answer_type_id', 'question_answer_type')->references('id')->on('answer_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('category_id', 'question_category')->references('id')->on('category')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->dropForeign('question_answer_type');
			$table->dropForeign('question_category');
		});
	}

}
