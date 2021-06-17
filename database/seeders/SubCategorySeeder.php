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
              'category_id' => '1',
              'name' => 'Asus',
            ],
            [
              'category_id' => '1',
              'name' => 'Dell',
            ],

            [
                'category_id' => '2',
                'name' => 'Samsung',
            ],
            [
                'category_id' => '2',
                'name' => 'Xiaomi',
            ],
            [
                'category_id' => '2',
                'name' => 'Apple',
            ],
            [
                'category_id' => '3',
                'name' => 'HP',
            ],

        ]);
    }
}
