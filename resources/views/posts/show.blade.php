@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    <div class="row">
        <div class="col-md-12">
            <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:100%">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>{{$post->body}}</p>
        </div>
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div class="row">
                <div class="col-md-12">
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
                    <div class="d-inline-block">
                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection