<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question', function(Blueprint $table)
        {
            $table->string('image_file', 100)->nullable();
            $table->string('call_action', 400)->nullable();
            $table->string('share_text', 100)->nullable();
        });
        
        Schema::table('category', function(Blueprint $table)
        {
            $table->string('image_file', 100)->nullable();
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
             $table->dropColumn('image_file');
             $table->dropColumn('call_action');
             $table->dropColumn('share_text');
        });

        Schema::table('category', function(Blueprint $table)
        {
             $table->dropColumn('image_file');
        });
    }
}
