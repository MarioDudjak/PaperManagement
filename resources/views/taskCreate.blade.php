@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('taskCreate.header')</div>
            </div>
            <br>            
                <form method="post" action="{{ action('TaskController@createTask') }}" >
                    <label for="title">@lang('taskCreate.titleInput')</label>
                    <input type="text" name="title">
                    <br>
                    <label for="eng_title">@lang('taskCreate.engtitleInput')</label>
                    <input type="text" name="eng_title">
                    <br>                    
                    <label for="task">@lang('taskCreate.taskInput')</label>
                    <input type="text" name="task">
                    <br>                    
                    <p>@lang('taskCreate.degreeType')</p>
                    <select name="degree_type">
                        <option value="Undergraduate">@lang('taskCreate.undergraduate')</option>
                        <option value="Graduate">@lang('taskCreate.graduate')</option>
                        <option value="Professional">@lang('taskCreate.professional')</option>                        
                    </select>
                    <br>
                    <br>                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                        
                    <button type="submit" class="btn btn-info">@lang('taskCreate.buttonSubmit')</button>                        
                </form>                
            </div>
        </div>
    </div>
</div>
@endsection
