<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorBookRubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors_books')->insert([

            [
                'author_id' => 1,
                'book_id' => 3
            ],

            [
                'author_id' => 2,
                'book_id' => 4
            ],

            [
                'author_id' => 3,
                'book_id' => 1
            ],

            [
                'author_id' => 4,
                'book_id' => 2
            ],

            [
                'author_id' => 5,
                'book_id' => 5
            ],

            [
                'author_id' => 6,
                'book_id' => 5
            ]
        ]);

        DB::table('books_rubrics')->insert([

            [
                'book_id' => 3,
                'rubric_id' => 2
            ],

            [
                'book_id' => 4,
                'rubric_id' => 2
            ],

            [
                'book_id' => 1,
                'rubric_id' => 1
            ],

            [
                'book_id' => 2,
                'rubric_id' => 1
            ],

            [
                'book_id' => 5,
                'rubric_id' => 3
            ],

            [
                'book_id' => 5,
                'rubric_id' => 3
            ]
        ]);
    }
}
