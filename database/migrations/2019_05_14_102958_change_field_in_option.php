<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldInOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE `option` CHANGE COLUMN `text_answer` `text_answer` TEXT NULL DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE `option` CHANGE COLUMN `text_answer` `text_answer` VARCHAR(100) NULL DEFAULT NULL');
    }
}
