@extends('layouts.app')
@section('content')
    <h1>Create Category</h1>
    {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-check form-check-inline">
            {{Form::radio('type', 0, false, ['class' => 'form-check-input category-type', 'id' => 'parent'])}}
            {{Form::label('parent', 'Parent',['class' => 'form-check-label'])}}
        </div>
        <div class="form-check form-check-inline">
            {{Form::radio('type', 1, false, ['class' => 'form-check-input category-type', 'id' => 'sub'])}}
            {{Form::label('sub', 'Sub Category',['class' => 'form-check-label'])}}
        </div>
        <div class="form-group category-select">
            {{Form::select('category', $categories, null, ['class' => 'form-control', 'placeholder' => 'Choose Category...'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="custom-file mb-3">
            <input type="file" name="cover_image" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <button type="button" onclick="window.history.back()" class="btn btn-default back-btn">Cancel</button>
    {!! Form::close() !!}
@endsection
