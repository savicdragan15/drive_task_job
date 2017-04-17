<?php

namespace App\Http\Controllers;

use App\Author;
use App\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use App\Subscriber;
use App\Book;
use Auth;
class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSubscribers = Subscriber::select('*')->paginate(env('SUBSCRIBER_PER_PAGE', 10));
        
        return $this->loadView('admin.index', ['subscribers' => $allSubscribers]);
    }
    
    public function getSubscriber($id){
        
        $subscriber = Subscriber::find($id);
        $author = Author::find(2);
        //dd($author->books);
        $user = User::find(Auth::user()->id);

        dd($user->hasRole('admin'));
        if($subscriber == null){
           echo 'Model not found';          
           dd();
        }
        
        return $this->loadView('admin._subscriberDialog', ['subscriber' => $subscriber]);
    }
}
