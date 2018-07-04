@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of users</div>

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
                        <th width="33%">User role</th>
                        <th width="33%">Change role</th>  
                    </tr>                  
                    
                        @foreach ($users as $user)
                        <tr>
                            <td width="33%"> {{ $user->name }}</td>
                            <td width="33%"> {{ $user->user_type }}</td>
                            <td width="33%"><a href="{{ URL::to('user/' . $user->id . '/edit') }}" class="btn-default" >Change role</a></td>                            
                        </tr> 
                        @endforeach 
                        
                </table>                    
            </div>
        </div>
    </div>
</div>
@endsection
