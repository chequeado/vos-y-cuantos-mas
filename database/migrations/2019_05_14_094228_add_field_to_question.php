<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToQuestion extends Migration
{
   public function up()
    {
        Schema::table('question', function(Blueprint $table)
        {
            $table->boolean('published')->default(true);
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
            $table->dropColumn('published');
        });
    }
}
