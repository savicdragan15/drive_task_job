<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Author;

class BookController extends Controller
{
    /**
     * List all books
     */
   public function index()
   {
       $books = Book::select('*')->paginate(10);

       return $this->loadView('books.index', ['books' => $books]);
   }

    /**
     * Preview single book
     */
   public function book($slug)
   {
       $book = Book::where('slug', $slug)->first();

       if(is_null($book))
           abort(404);

       return $this->loadView('books.book', ['book' => $book]);
   }

    /**
     * List books by category slug
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if(is_null($category))
            abort(404);

        $books = $category->books()->paginate(10);

        return $this->loadView('books.list', ['books' => $books, 'category' => $category]);
    }

    /**
     * Search list books
     */
    public function search(Request $request)
    {
        if($request->exists('string')){
            $serachString = $request->input('string');
            $books = Book::where('book_name', 'like', "$serachString%")->paginate(10);

            return $this->loadView('books.list', ['books' => $books]);
        }
    }

    /**
     * Preview author books
     * @param $slug slug of author
     * @return view
     */
    public function author($slug)
    {
        $author = Author::where('slug', $slug)->first();

        if(is_null($author))
            abort(404);

        $books = $author->books()->paginate(10);


        return $this->loadView('books.list', ['books' => $books, 'author' => $author]);
    }


}
