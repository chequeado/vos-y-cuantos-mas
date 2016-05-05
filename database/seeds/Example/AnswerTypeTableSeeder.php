<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use App\Models\AnswerType;

class AnswerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $at               = new AnswerType;
        $at->name         = 'Options';
        $at->slug         = 'options';
        $at->created_at   = Carbon::now();
        $at->updated_at   = Carbon::now();
        $at->save();
    }
}
