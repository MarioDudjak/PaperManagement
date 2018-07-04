@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <div style="margin-top:20px;" class="card">
                @if(!(Auth::user()->confirmedTask()->get()->isEmpty()))
                    <div class="card-header">Your task</div>
                     
                <table style="width:100%; padding:5%">
                        <tr></tr>
                            <th width="16%">Title</th>
                            <th width="16%">English title</th>
                            <th width="16%">Task</th>  
                            <th width="16%">Degree type</th> 
                            <th width="16%">Mentor</th>                                                                          
                                                                         
                        </tr>                  
                        <tr>
                            <td width="16%"> {{ Auth::user()->confirmedTask()->get()->first()->title }}</td>
                            <td width="16%"> {{ Auth::user()->confirmedTask()->get()->first()->eng_title }}</td>
                            <td width="16%"> {{ Auth::user()->confirmedTask()->get()->first()->task }}</td> 
                            <td width="16%"> {{ Auth::user()->confirmedTask()->get()->first()->degree_type }}</td>       
                            <td width="16%"> {{ Auth::user()->confirmedTask()->get()->first()->mentor()->first()->name }}</td>                                  
                        </tr>                 
                    </table>

                @else

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
                        <th width="16%">Mentor</th>                                                                          
                        <th width="16%">Apply status</th>                           
                                                                     
                    </tr>                  
                    
                        @foreach ($tasks as $task)
                        <tr>
                            <td width="16%"> {{ $task->title }}</td>
                            <td width="16%"> {{ $task->eng_title }}</td>
                            <td width="16%"> {{ $task->task }}</td> 
                            <td width="16%"> {{ $task->degree_type }}</td>       
                            <td width="16%"> {{ !($task->mentor()->get()->isEmpty()) ? $task->mentor()->get()->last()->name: '' }}</td>     
                            @if($task->appliedStudents()->get()!=null && $task->appliedStudents()->get()->contains('id',Auth::user()->id))
                                <td width="16%"><a href="{{ URL::to('task/' . $task->id . '/withdraw') }}" class="btn-default" >Withdraw</a></td>                                                                                    
                            @else
                                @if(Auth::user()->appliedTasks()->get()->count()<5)
                                    <td width="16%"><a href="{{ URL::to('task/' . $task->id . '/apply') }}" class="btn-default" >Apply</a></td>                                                                                    
                                @else
                                    <td width="16%"> - </td>                                                                                                                    
                                @endif
                            @endif                                 
                        </tr> 
                        @endforeach     
                </table>  
                @endif  
                
                    <div style="margin-top:20px;" class="card-header">Applied tasks</div>
                    <table style="margin-top:20px; width:100%; padding:5%">
                        <tr></tr>
                            <th width="16%">Priority</th>
                            <th width="16%">Title</th> 
                            <th width="16%">Mentor</th>                                                                                                                                                                                                          
                        </tr>                  
                            @foreach (Auth::user()->appliedTasks()->get() as $index=>$task)
                            <tr>
                                <td width="16%"> {{ $index+1}}</td>
                                <td width="16%"> {{ $task->title }}</td>
                                <td width="16%"> {{ !($task->mentor()->get()->isEmpty()) ? $task->mentor()->get()->last()->name: '' }}</td>     
                                                               
                            </tr> 
                            @endforeach     
                    </table> 
            </div>
        </div>
    </div>
</div>
@endsection
