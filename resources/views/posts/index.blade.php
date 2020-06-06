@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 text-center">
            <h3>Posts</h3>
        </div>
        <div class="col-md-6 text-center">
            <a class="nav-link" href="/posts/create">Add Post</a>
        </div>
    </div>

    @if(count($posts) > 0)
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach($posts as $post)

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:20%">
                            </div>
                            <div class="col-md-4">
                                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                <small>
                                    Written on {{$post->created_at}}
                                    <br>For: {{$post->categoryName}} |
                                    Created by: {{$post->name}}
                                </small>
                            </div>
                            @auth
                                <div class="col-md-4 text-right">
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
        </div>
    @else
    @endif
@endsection
