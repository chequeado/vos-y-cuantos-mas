<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExampleDataSeeder extends Seeder
{
    public function run()
    {

        $this->call(CategoryTableSeeder::class);
        $this->call(AnswerTypeTableSeeder::class);
        $this->call(QuestionTableSeeder::class);

    }
}
