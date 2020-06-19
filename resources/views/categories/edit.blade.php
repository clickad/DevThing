@extends('layouts.app')
@section('content')
    <h3>Edit Category</h3>
    {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-check form-check-inline">
            {{Form::radio('type', 0, $category->category_type == 0 ? true : false, ['class' => 'form-check-input category-type', 'id' => 'parent'])}}
            {{Form::label('parent', 'Parent',['class' => 'form-check-label'])}}
        </div>
        <div class="form-check form-check-inline">
            {{Form::radio('type', 1, $category->category_type == 1 ? true : false, ['class' => 'form-check-input category-type', 'id' => 'sub'])}}
            {{Form::label('sub', 'Sub Category',['class' => 'form-check-label'])}}
        </div>
        <div class="form-group category-select">
            {{Form::select('category', $categories, $category->parent_category, ['class' => 'form-control', 'placeholder' => 'Choose Category...'])}}
        </div>
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="custom-file mb-3">
            <input type="file" name="cover_image" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <button type="button" onclick="window.history.back()" class="btn btn-default back-btn">Cancel</button>
    {!! Form::close() !!}
@endsection
