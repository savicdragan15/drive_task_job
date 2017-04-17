<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function authors()
    {
        return $this->belongsToMany('App\Author', 'books_authors', 'book_id', 'author_id');
        //return $this->hasOne('App\Author', 'author_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'books_images', 'book_id', 'image_id');

    }
}
