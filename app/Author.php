<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_authors', 'author_id', 'book_id');
    }
}
