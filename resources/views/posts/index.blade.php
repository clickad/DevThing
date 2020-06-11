@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <button onclick="window.history.back()" class="btn btn-default back-btn float-left">Go back</button>
            <h1>Posts</h1>
        </div>
    </div>
    <div class="card">
        @if(count($posts) > 0)
            <ul class="list-group list-group-flush">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:20%">
                            </div>
                            <div class="col-md-6">
                                <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4 >
                                <small>
                                    Written on {{$post->created_at}}
                                    <br>
                                    For: {{$post->categoryName}} |
                                    Created by: {{$post->name}}
                                </small>
                            </div>
                            @auth
                                <div class="col-md-3 text-right">
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                                    <div class="d-inline-block">
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-default'])}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <div>There are no Posts for this Category.</div>
                </div>
            </div>
        @endif
    </div>
@endsection
