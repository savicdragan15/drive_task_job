<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
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
        $allSubscribers = Subscriber::select('*')->paginate(env('SUBSCRIBER_PER_PAGE'));
        
        return view('admin.index', ['subscribers' => $allSubscribers]);
    }
    
    public function getSubscriber($id){
        
        $subscriber = Subscriber::find($id);
        
        if($subscriber == null){
           echo 'Model not found';          
           dd();
        }
              
        return view('admin._subscriberDialog', ['subscriber' => $subscriber]);
    }
}
