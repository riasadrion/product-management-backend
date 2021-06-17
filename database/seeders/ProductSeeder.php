<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
              'name' => 'A11',
              'sub_category_id' => '1',
            ],
            [
              'name' => 'A12',
              'sub_category_id' => '1',
            ],
            [
              'name' => 'A13',
              'sub_category_id' => '1',
            ],
            [
              'name' => 'A14',
              'sub_category_id' => '2',
            ],
            [
              'name' => 'A15',
              'sub_category_id' => '1',
            ],
            [
              'name' => 'A16',
              'sub_category_id' => '2',
            ],
            [
              'name' => 'A17',
              'sub_category_id' => '2',
            ],
            [
              'name' => 'A18',
              'sub_category_id' => '1',
            ],
        ]);

    }
}

