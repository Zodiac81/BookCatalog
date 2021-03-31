<?php


namespace App\Services\Book;

use App\Http\Resources\SingleBookResource;

interface IBook
{
    public function store(array $data): SingleBookResource;
    public function update(array $data, $book): SingleBookResource;
    public function delete($book): void;
}
