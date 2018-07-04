@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row" >
                <a  style="padding:15px; margin-left:15px;" href="{{ URL::to('task/en/create') }}" class="btn-info" >Add task</a>                                                          
                <a  style="padding:15px; margin-left:15px;" href="{{ URL::to('task/cro/create') }}" class="btn-info" >Dodaj zadatak</a>                                                                          
            </div>
            <div style="margin-top:20px;" class="card">
                <div class="card-header">List of tasks</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <table style="width:100%; padding:5%">
                    <tr></tr>
                        <th width="16%">Title</th>
                        <th width="16%">English title</th>
                        <th width="16%">Task</th>  
                        <th width="16%">Degree type</th> 
                        <th width="16%">Applied students</th>    
                        <th width="16%">Chosen student</th>                                                                          
                    </tr>                  
                    
                        @foreach ($tasks as $task)
                        <tr>
                            <td width="16%"> {{ $task->title }}</td>
                            <td width="16%"> {{ $task->eng_title }}</td>
                            <td width="16%"> {{ $task->task }}</td> 
                            <td width="16%"> {{ $task->degree_type }}</td>       
                            <td width="16%"> {{ implode(",", $task->appliedStudents()->get()->pluck('name')->toArray()) }}</td>  
                            @if (!($task->student()->get()->isEmpty()))    
                                <td width="16%">{{$task->student()->get()->first()->name}}</td>          
                            @else                                                                    
                                <td width="16%"><a href="{{ URL::to('task/' . $task->id . '/student') }}" class="btn-default" >Choose</a></td>                                                                                                                
                            @endif
                        </tr> 
                        @endforeach     
                </table>                    
            </div>
        </div>
    </div>
</div>
@endsection
