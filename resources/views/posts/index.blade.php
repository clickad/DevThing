@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-center bg-secondary text-white">
            <div class="row">
                <div class="col-md-12 text-center">
                    <button onclick="window.history.back()" class="btn btn-default back-btn">
                        <span class="oi oi-chevron-left text-white"></span>
                    </button>
                    <h4 class="mb-0">Posts</h4>
                </div>
            </div>
        </div>
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
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">
                                        <span class="oi oi-pencil"></span>
                                    </a>
                                    <div class="d-inline-block">
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'id'=>'del-post']) !!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::button(
                                                '<span class="oi oi-trash"></span>',
                                                [
                                                    'type' => 'button',
                                                    'class' => 'btn btn-default',
                                                    'data-toggle'=>'modal',
                                                    'data-target'=>'#confirmModal',
                                                    'data-type'=>'post'
                                                ]
                                            )}}
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
                <div class="col-md-12 text-center pt-2 pb-2">
                    <div>There are no Posts for this Category.</div>
                </div>
            </div>
        @endif
    </div>
@endsection
