@extends('layouts.app')

@section('content')
    <h1>Create new Todo</h1>
    {!! Form::open(['action' => 'TodoController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'newPostForm']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
            {{-- {{Form::hidden('body', '', ['class' => 'form-control', 'id' => 'hidden-body-input', 'placeholder' => 'Name'])}} --}}

            {{-- <div class = "clickad-rtxte-container">
                <div id = "clickad-rtxte">
                <!-- Editor created here -->
                </div>
            </div> --}}
        </div>
        {{-- <div class="form-group">
            {{Form::select('category', $categories, null, ['class' => 'form-control', 'placeholder' => 'Choose Category...'])}}
        </div> --}}
        {{-- <div class="custom-file mb-3">
            <input type="file" name="cover_image" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" onclick="window.history.back()" class="btn btn-default cancel-btn">Cancel</button>
    {!! Form::close() !!}
@endsection
