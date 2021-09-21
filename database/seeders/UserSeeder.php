<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

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
            'name' => 'fatra',
            'email' => 'fatra@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('12345678')
        ]);
    }
}
