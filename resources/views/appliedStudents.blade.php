@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div style="margin-top:20px;" class="card">
                        <div class="card-header">Task info</div>
        
                <table style="width:100%; padding:5%; margin:5%">
                        <tr></tr>
                            <th width="16%">Title</th>
                            <th width="16%">English title</th>
                            <th width="16%">Task</th>  
                            <th width="16%">Degree type</th> 
                                                                                                   
                        </tr>                  
                        <tr>
                            <td width="16%"> {{ $task->title }}</td>
                            <td width="16%"> {{ $task->eng_title }}</td>
                            <td width="16%"> {{ $task->task }}</td> 
                            <td width="16%"> {{ $task->degree_type }}</td>              
                        </tr> 
                    </table>  
        
            <div style="margin-top:20px;" class="card">
                <div class="card-header">List of applied students</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                           

                    <table style="width:100%; margin:5%;">
                            <tr></tr>
                                <th width="33%">Name</th>
                                <th width="33%">Email</th>
                                <th width="33%">Choose student</th>  
                            </tr>                  
                            
                                @foreach ($students as $student)
                                <tr>
                                    <td width="33%"> {{ $student->name }}</td>
                                    <td width="33%"> {{ $student->email }}</td>  
                                    @if(\App\User::find($student->id)->appliedTasks()->get()->first()->id==$task->id)                                  
                                        <td width="33%"><a href="{{ URL::to('task/'. $task->id .'/student/' . $student->id . '/confirm') }}" class="btn-default" >Confirm</a></td>                            
                                    @else
                                        <td width="33%"> - </td>                                                                
                                    @endif
                                    </tr> 
                                @endforeach 
                                
                    </table>        
            </div>
        </div>
    </div>
</div>
@endsection
