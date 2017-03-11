<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Subscriber extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
    ];
    
    protected $dates = ['birthday'];
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];
    
    
    /**
     * Insert new Subscriber in table
     * @param Request $request
     * @return boolean
     */
    public function insertSubscriber(Request $request){
        $this->subscriber_name = $request->input('name');
        $this->subscriber_surname = $request->input('surname');
        $this->gender = $request->input('gender');
        $this->city = $request->input('city');
        $this->head = $request->input('head');
        $this->postalcode = $request->input('postalcode');
        $this->issue = $request->input('issue');
        $this->birthday = $request->input('year')."-".$request->input('mounth')."-".$request->input('day');
        
        return $this->save();
    }
}
