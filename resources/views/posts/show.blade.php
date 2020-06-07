@extends('layouts.app')
@section('content')
<div class="row mb-2">
    <div class="col-md-12 text-center">
        <a href="/posts" class="btn btn-default back-btn">Go back</a>
        <h1>{{$post->title}}</h1>
    </div>
</div>
    @if($post->cover_image != 'noimage.jpg')
        <div class="row mb-1">
            <div class="col-md-12 text-center">
                <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:15%">
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <p>{{$post->body}}</p>
        </div>
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
@endsection
