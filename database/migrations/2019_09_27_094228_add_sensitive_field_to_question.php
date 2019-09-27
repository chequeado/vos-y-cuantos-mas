<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSensitiveFieldToQuestion extends Migration
{
   public function up()
    {
        Schema::table('question', function(Blueprint $table)
        {
            $table->boolean('sensitive')->default(false);
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
            $table->dropColumn('sensitive');
        });
    }
}
