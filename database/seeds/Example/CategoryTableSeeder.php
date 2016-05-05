<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon as Carbon;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat               = new Category;
        $cat->name         = 'General';
        $cat->created_at   = Carbon::now();
        $cat->updated_at   = Carbon::now();
        $cat->save();
    }
}
