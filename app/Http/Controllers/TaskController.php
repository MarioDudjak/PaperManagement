<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use \App\User;
use Session;
use App;
use Auth;
use \App\Task;

class TaskController extends Controller
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

    public function createForm($lang){
        App::setLocale($lang);                
        return view('taskCreate');      
    }

    public function createTask(Request $request){
       $data=$request->all();
       $user=Auth::user();
       $task = new Task();
       $task->fill($data);
       $task->save();        
   

       $user->createdTasks()->save($task);
       $user->save(); 
    
       $task->mentor()->associate($user);                     
       $task->save();     
             
       Session::flash('message', 'Task successfuly created!');
       return redirect('/home');
    }

    public function apply($id){
        $task= Task::find($id);   
        $user = Auth::user();

        $task->appliedStudents()->attach($user);
        $task->save();
    
        Session::flash('message', 'You have successfuly applied for this task!');        
        return redirect('/home');        
    }

    public function withdraw($id){
        $task= Task::find($id);   
        $user = Auth::user();
        $task->appliedStudents()->detach($user);
        $task->save();
        Session::flash('message', 'You have successfuly withdraw for this task!');        
        return redirect('/home');        
    }

    public function chooseStudent($id){
        $task= Task::find($id);

        return view('appliedStudents',['task' => $task, 'students' => $task->appliedStudents()->get()]);        
    }

    public function confirmStudent($task_id, $student_id){
        $task= Task::find($task_id);
        $user = User::find($student_id);

        $user->confirmedTask()->save($task);
        $user->save(); 
     
        $task->student()->associate($user);                     
        $task->save();   

        Session::flash('message', 'You have successfuly confirmed student for this task!');        
        return redirect('/home');   
    }

}
