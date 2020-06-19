@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h2>{{$todo->title}}</h2>
        </div>
        <div class="col-md-12 text-center">
            <p>{{$todo->description}}</p>
         </div>
    </div>
@endsection
