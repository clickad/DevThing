@extends('layouts.app')

@section('content')
    <h1>Edit Todo</h1>
    {!! Form::open(['action' => ['TodoController@update', $todo->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $todo->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $todo->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" onclick="window.history.back()" class="btn btn-default cancel-btn">Cancel</button>
    {!! Form::close() !!}
@endsection
