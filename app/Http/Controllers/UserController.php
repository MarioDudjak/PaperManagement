<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use \App\User;
use Session;

class UserController extends Controller
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

    public function edit($id){
        $user = User::find($id);    
        $user_types=['admin','student','teacher'];
        return view('user', ['user' => $user ,'user_types' =>$user_types]);        
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->user_type=$request->type;
        $user->save();

        Session::flash('message', 'User successfuly updated!');
        return redirect('/home');
    }
}
