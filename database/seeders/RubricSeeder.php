<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubrics')->insert([
            ['name' => 'Rubric 1'],
            ['name' => 'Rubric 2'],
            ['name' => 'Rubric 3']
        ]);
    }
}
