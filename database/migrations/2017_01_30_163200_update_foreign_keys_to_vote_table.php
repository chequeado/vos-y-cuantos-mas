<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateForeignKeysToVoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vote', function(Blueprint $table)
		{
			$table->dropForeign('vote_question');
			$table->dropForeign('vote_option');

			$table->foreign('question_id', 'vote_question')->references('id')->on('question')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('option_id', 'vote_option')->references('id')->on('option')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vote', function(Blueprint $table)
		{
			$table->dropForeign('vote_question');
			$table->dropForeign('vote_option');

			$table->foreign('question_id', 'vote_question')->references('id')->on('question')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('option_id', 'vote_option')->references('id')->on('option')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}

}
