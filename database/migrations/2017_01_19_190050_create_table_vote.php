<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('_token', 100)->nullable();
            $table->integer('question_id')->unsigned()->index('vote_question_idx');
            $table->integer('option_id')->unsigned()->index('vote_option_id_idx');
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
        Schema::drop('vote');
    }
}
