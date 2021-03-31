<?php


namespace App\Services\Author;

use App\Http\Resources\SingleAuthorResource;
use App\Models\Author;

class AuthorService implements IAuthor
{
    public function store(array $data): SingleAuthorResource
    {
        $author = Author::create($data);
        return new SingleAuthorResource($author);
    }

    public function update(array $data, $author): SingleAuthorResource
    {
        if($author->update($data)) {
            return new SingleAuthorResource($author);
        }
    }

    public function delete($author): void
    {
        $author->delete();
    }
}
