@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <form method="post" action="{{ action('UserController@updateUser') }}" >
                <table style="width:100%; margin:5%;">
                    <tr>
                        <th width="33%">Name</th>
                        <th width="33%">Email</th>                        
                        <th width="33%">User role</th>
                    </tr>                  
                
                    <tr>
                        <td width="33%"> {{ $user->name }}</td>
                        <td width="33%"> {{ $user->email }}</td>                            
                        <td width="33%">
                            @foreach($user_types as $type)
                                    <input type="radio" value="{{$type}}" name="type"><span>{{ $type }}</span>
                                    <br>                                   
                            @endforeach
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $user->id }}">                            
                            <button type="submit" class="btn btn-info">Update user</button>
                        </td>
                    </tr>
                </table>                    
            </div>
        </div>
    </div>
</div>
@endsection
