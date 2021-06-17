<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
              'name' => 'Admin',
              'email' => 'admin@gmail.com',
              'password' => '$2y$10$M3nzwcPf/WxoNpK0hBllru.58u7xkgkHgtJ.bwh/d0.Mxm6MlMwAe'
            ]

        ]);
    }
}
