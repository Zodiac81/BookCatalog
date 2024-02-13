<?php

namespace App\Repositories;

use App\Models\Book;
class BookRepository extends BaseApiRepository
{
    public function __construct()
    {
        parent::__construct(Book::class);
    }

}
