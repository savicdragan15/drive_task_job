<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nestable\NestableTrait;

class Category extends Model
{
    use NestableTrait;

    protected $parent = 'parent_id';

    public function books()
    {
        return $this->belongsToMany('App\Book', 'books_categories', 'category_id', 'book_id');

    }
}
