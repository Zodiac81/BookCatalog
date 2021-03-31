<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'books_rubrics', 'rubric_id', 'book_id')->distinct();
    }

    public static function getAllWithPaginate()
    {
        return self::with('books')->orderBy('name')->paginate(5);
    }
}
