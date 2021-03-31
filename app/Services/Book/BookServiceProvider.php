<?php

namespace App\Services\Book;

use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    public function register()
    {
       // $this->app->bind(IBook::class,  BookService::class);
    }
}
