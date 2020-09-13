@extends('layouts.app')

@section('content')
    <h1>Create new Skill</h1>
    {!! Form::open(['action' => 'SkillsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'newSkillForm']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('progress', 'Progress')}}
            {{Form::range('progress', '', ['class' => 'form-control-range', 'placeholder' => 'Progress'])}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" onclick="window.history.back()" class="btn btn-default cancel-btn">Cancel</button>
    {!! Form::close() !!}
@endsection
