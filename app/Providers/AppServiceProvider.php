<?php

namespace App\Providers;

use App\Contracts\CRUDInterface;
use App\Contracts\RepositoryInterface;
use App\Repositories\BaseApiRepository;
use App\Services\Author\AuthorService;
use App\Services\Author\IAuthor;
use App\Services\BaseApiService;
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
//        $this->app->bind(CRUDInterface::class,  BaseApiService::class);
        $this->app->bind(RepositoryInterface::class,  BaseApiRepository::class);
//        $this->app->bind(IBook::class,  BookService::class);
//        $this->app->bind(IRubric::class,  RubricService::class);
//        $this->app->bind(IAuthor::class,  AuthorService::class);
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
