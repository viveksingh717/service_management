<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category_name'=>'Appliances',
                'category_slug'=>'appliances',
                'category_image'=>'1521972593.png',
                'status'=>1,
            ],
            [
                'category_name'=>'Home Needs',
                'category_slug'=>'home_needs',
                'category_image'=>'1521969622.png',
                'status'=>1,
            ],
            [
                'category_name'=>'Home Cleaning',
                'category_slug'=>'home_cleaning',
                'category_image'=>'1521969446.png',
                'status'=>1,
            ],
            [
                'category_name'=>'Special Services',
                'category_slug'=>'special_services',
                'category_image'=>'1521969576.png',
                'status'=>1,
            ],
        ]);
    }
}
