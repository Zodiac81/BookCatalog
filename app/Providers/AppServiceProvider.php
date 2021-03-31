<?php

namespace App\Providers;

use App\Services\Author\AuthorService;
use App\Services\Author\IAuthor;
use App\Services\Book\BookService;
use App\Services\Book\IBook;
use App\Services\Rubric\IRubric;
use App\Services\Rubric\RubricService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBook::class,  BookService::class);
        $this->app->bind(IRubric::class,  RubricService::class);
        $this->app->bind(IAuthor::class,  AuthorService::class);
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
    }
}
