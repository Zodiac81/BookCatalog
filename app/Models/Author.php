<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'authors_books', 'author_id', 'book_id');
    }

    public static function getAllWithPaginate()
    {
        return self::with('books')->orderBy('last_name')->paginate(10);
    }
}
