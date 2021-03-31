<?php

use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\RubricController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'books' => BookController::class,
    'rubrics' => RubricController::class,
    'authors' => AuthorController::class
]);


