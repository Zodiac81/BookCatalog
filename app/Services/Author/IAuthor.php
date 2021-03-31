<?php


namespace App\Services\Author;

use App\Http\Resources\SingleAuthorResource;

interface IAuthor
{
    public function store(array $data): SingleAuthorResource;
    public function update(array $data, $author): SingleAuthorResource;
    public function delete($author): void;
}
