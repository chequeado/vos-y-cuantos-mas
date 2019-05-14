<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgSourceInQuestion extends Migration
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
            $table->string('image_credit_source', 400)->nullable();
            $table->string('image_credit_link', 400)->nullable();
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
             $table->dropColumn('image_credit_source');
             $table->dropColumn('image_credit_link');
        });
    }
}
