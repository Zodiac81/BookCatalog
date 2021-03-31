<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'first_name' => 'Harper',
                'last_name' => 'Li'
            ],
            [
                'first_name' => 'Toni',
                'last_name' => 'Morrison'
            ],
            [
                'first_name' => 'Yann',
                'last_name' => 'Martel'
            ],
            [
                'first_name' => 'Jack',
                'last_name' => 'London'
            ],
            [
                'first_name' => 'Alan',
                'last_name' => 'Moore'
            ],
            [
                'first_name' => 'Dave',
                'last_name' => 'Gibbons'
            ],
        ]);
    }
}
