<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['title'];

    /**
     * @var bool
     */
    public $timestamps = false;


    public function authors()
    {
        return $this->belongsToMany(Author::class, 'authors_books', 'book_id', 'author_id')->distinct();
    }

    public function rubrics()
    {
        return $this->belongsToMany(Rubric::class, 'books_rubrics', 'book_id', 'rubric_id')->distinct();
    }

    public static function getAllWithPaginate()
    {
        return self::with('authors', 'rubrics')
            ->orderBy('title')
            ->paginate(10);
    }
}
