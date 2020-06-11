@extends('layouts.app')
@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'newPostForm']) !!}
        <div class="form-group">
            {{Form::label('title', 'TItle')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{-- {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}} --}}
            {{Form::hidden('body', '', ['class' => 'form-control', 'id' => 'hidden-body-input', 'placeholder' => 'Name'])}}

            <div class = "clickad-rtxte-container">
                <div id = "clickad-rtxte">
                <!-- Editor created here -->
                </div>
            </div>
        </div>
        <div class="form-group">
            {{Form::select('category', $categories, null, ['class' => 'form-control', 'placeholder' => 'Choose Category...'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{-- {{Form::submit('Submit', ['class' => 'btn btn-primary'])}} --}}
        <button type="button" class="btn btn-primary" id="new-post-submit">Submit</button>
        <button type="button" onclick="window.history.back()" class="btn btn-default back-btn">Cancel</button>
    {!! Form::close() !!}
@endsection
