<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            ['title' => 'Life of Pi'],
            ['title' => 'The Call of the Wild'],
            ['title' => 'To Kill a Mockingbird'],
            ['title' => 'Beloved'],
            ['title' => 'Watchmen']
        ]);
    }
}
