<?php


namespace App\Services\Book;

use App\Http\Resources\SingleBookResource;
use App\Models\Book;

class BookService implements IBook
{
    public function store(array $data): SingleBookResource
    {
        $book = Book::create($data);

        if(!$book){
            abort(500, 'Could not create a Book');
        }

        $book->authors()->attach($data['authors']);
        $book->rubrics()->attach($data['rubrics']);

        return new SingleBookResource($book);
    }

    public function update(array $data, $book): SingleBookResource
    {
        if($book->update($data)) {
            $book->authors()->sync($data['authors']);
            $book->rubrics()->sync($data['rubrics']);
            return new SingleBookResource($book);
        }
    }

    public function delete($book): void
    {
        if($book->delete()){
            $book->authors()->detach();
            $book->rubrics()->detach();
        }
    }
}
