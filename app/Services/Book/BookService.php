<?php

namespace App\Services\Book;

use App\Repositories\BookRepository;
use App\Services\BaseApiService;
use Illuminate\Support\Facades\App;

class BookService extends BaseApiService
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct(App::make(BookRepository::class));
    }
}
