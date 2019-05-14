<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldInQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `question` CHANGE COLUMN `answer_description` `answer_description` TEXT NULL DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `question` CHANGE COLUMN `answer_description` `answer_description` VARCHAR(200) NULL DEFAULT NULL');
    }
}
