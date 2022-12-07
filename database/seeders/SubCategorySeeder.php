<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Computer Repair',
                'subCategory_slug'=>'computer_repair',
                'subCategory_image'=>'1521969512.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'TV',
                'subCategory_slug'=>'tv',
                'subCategory_image'=>'1521969522.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Appliances',
                'subCategory_slug'=>'appliances',
                'subCategory_image'=>'1521972593.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'AC',
                'subCategory_slug'=>'ac',
                'subCategory_image'=>'1521969345.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Geyser',
                'subCategory_slug'=>'geyser',
                'subCategory_image'=>'1521969446.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Washing Machine',
                'subCategory_slug'=>'washing_machine',
                'subCategory_image'=>'1521972593.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Microwave Oven',
                'subCategory_slug'=>'microwave_oven',
                'subCategory_image'=>'1521972769.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Chimney and Hob',
                'subCategory_slug'=>'chimney_hob',
                'subCategory_image'=>'1521969490.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Water Purifier',
                'subCategory_slug'=>'Water_purifier',
                'subCategory_image'=>'1521969430.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>1,
                'subCategory_name'=>'Refrigerator',
                'subCategory_slug'=>'refrigerator',
                'subCategory_image'=>'1521969536.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>2,
                'subCategory_name'=>'Laundry',
                'subCategory_slug'=>'laundry',
                'subCategory_image'=>'1521972624.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>2,
                'subCategory_name'=>'Electrical',
                'subCategory_slug'=>'electrical',
                'subCategory_image'=>'1521969419.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>2,
                'subCategory_name'=>'Pest Control',
                'subCategory_slug'=>'pest_control',
                'subCategory_image'=>'1521969464.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>2,
                'subCategory_name'=>'Carpentry',
                'subCategory_slug'=>'carpentry',
                'subCategory_image'=>'1521969454.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>2,
                'subCategory_name'=>'Plumbing',
                'subCategory_slug'=>'plumbing',
                'subCategory_image'=>'1521969409.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>2,
                'subCategory_name'=>'Painting',
                'subCategory_slug'=>'painting',
                'subCategory_image'=>'1521969558.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>2,
                'subCategory_name'=>'Movers &amp; Packers',
                'subCategory_slug'=>'movers_packers',
                'subCategory_image'=>'1521969599.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>3,
                'subCategory_name'=>'Overhead Water Storage',
                'subCategory_slug'=>'overhead_water_storage',
                'subCategory_image'=>'1521972643.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>3,
                'subCategory_name'=>'Tank Cleaning',
                'subCategory_slug'=>'tank_cleaning',
                'subCategory_image'=>'1521969446.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>3,
                'subCategory_name'=>'Home Deep Cleaning',
                'subCategory_slug'=>'home_deep_cleaning',
                'subCategory_image'=>'1521969622.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>3,
                'subCategory_name'=>'Fabric Sofa Shampooing',
                'subCategory_slug'=>'fabric_sofa_shampooing',
                'subCategory_image'=>'1521969430.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>3,
                'subCategory_name'=>'Bathroom Deep Cleaning',
                'subCategory_slug'=>'bathroom_deep_cleaning',
                'subCategory_image'=>'1521969446.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>3,
                'subCategory_name'=>'Kitchen Deep Cleaning',
                'subCategory_slug'=>'kitchen_deep_cleaning',
                'subCategory_image'=>'1521969490.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>4,
                'subCategory_name'=>'Document Services',
                'subCategory_slug'=>'document_services',
                'subCategory_image'=>'1521974355.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>4,
                'subCategory_name'=>'Cars And Bikes',
                'subCategory_slug'=>'cars_bikes',
                'subCategory_image'=>'1521969576.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>4,
                'subCategory_name'=>'Home Automation',
                'subCategory_slug'=>'home_automation',
                'subCategory_image'=>'1521969622.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
            [
                'parentCategory_id'=>4,
                'subCategory_name'=>'Beauti',
                'subCategory_slug'=>'beauti',
                'subCategory_image'=>'1521969358.png',
                'subCategory_desc'=>'It is a long established fact that a reader will be distracted by the readable content.',
                'status'=>1,
            ],
        ]);
    }
}
