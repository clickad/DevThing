@extends('layouts.app')
@section('content')
    <h1>{{$title}}</h1>
    @if(count($skills) > 0)
    <ul>
        @foreach($skills as $skill)
            <li>
                {{$skill}}
            </li>
        @endforeach
    </ul>
    @endif
@endsection
