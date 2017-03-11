<?php

namespace App\Http\Controllers;

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
        return view('home.index');
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
            \Session::flash('message', 'Došslo je do greške!'); 
            \Session::flash('alert-class', 'alert-danger'); 
        }
        
        return view('home.index');
    }
}
