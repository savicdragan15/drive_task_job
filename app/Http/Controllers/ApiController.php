<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Category;
use App\Author;
use App\Licence;
class ApiController extends Controller
{
    function __construct()
    {
        if(!$this->_checkAuth()){
            echo json_encode(['message' => 'Not authorize']);
            die;
        }

    }

    private function _checkAuth(){

        if(isset($_SERVER['HTTP_X_AUTHORIZED']) && $_SERVER['HTTP_X_AUTHORIZED'] != ''){
            $licence = Licence::where(['status' => 1, 'licence_key' => $_SERVER['HTTP_X_AUTHORIZED']])->first();
            if($licence) return true;
        }
        return false;
    }


    public function getCategories()
    {
        return Category::nested()->get();
    }


    public function getAllBooks()
    {
        $books = Book::all();

        if(!empty($books)){
            foreach ($books as $book){
                $book['images'] = $book->images;
                $book['authors'] = $book->authors;
            }
        }

        return $books;
    }

    public function getAllAuthors(){
        $authors = Author::all();
        if($authors)
            return $authors;

        return ['message' => 'Authors not found'];
    }

    public function getBooksAuthor(Request $request){

        $books = ['message' => 'No results'];
        if($request->input('author_id')){
            $author = Author::find($request->input('author_id'));
            if ($author){
                $books['books'] = $author->books;
                $books['message'] = 'Found '.count($author->books).' books for '. $author->author_name;
            }

        }
        return $books;
    }
}
