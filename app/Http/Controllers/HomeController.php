<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Subscriber;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::select('*')->paginate('');

        return $this->loadView('books.index', ['books' => $books]);
    }

    /**
     * Insert new subscriber
     * @param Request $request
     */
    public function postIndex(Request $request){
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'gender' => 'required',
            'city' => 'required|max:255',
            'postalcode' => 'required|max:5',
            'issue' => 'required|max:255',
            'head' => 'required|max:255',
            'day' => 'numeric',
            'mounth' => 'numeric',
            'year' => 'numeric',
        ]);
        
        $subscriber = new Subscriber;
        
        if($subscriber->insertSubscriber($request)){
            \Session::flash('message', 'Uspešno'); 
            \Session::flash('alert-class', 'alert-success'); 
        }else{
            \Session::flash('message', 'Došlo je do greške!');
            \Session::flash('alert-class', 'alert-danger'); 
        }
        
       return $this->loadView('home.index');
    }
}
