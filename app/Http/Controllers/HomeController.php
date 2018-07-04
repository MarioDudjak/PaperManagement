<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use Auth;
use \App\User;
use \App\Task;

class HomeController extends Controller
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
        $userId = Auth::id();        
        $users = User::all();
        if(Gate::allows('isAdmin')){
            return view('admin', ['users' => $users]);
        }
        elseif(Gate::allows('isTeacher')){
           $user=Auth::user();
           $tasks = $user->createdTasks()->get();               
           return view('teacher', ['tasks' => $tasks]);
        }
        elseif(Gate::allows('isStudent')){
            $tasks=Task::doesntHave('student')->get();
            return view('student',['tasks' => $tasks]);
        }
        else{
            return view('home');
        }
    }
}
