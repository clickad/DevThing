@extends('layouts.app')
@section('content')
<div class="row mb-2">
    <div class="col-md-12 text-center">
        <button onclick="window.history.back()" class="btn btn-default back-btn">
            <span class="oi oi-chevron-left"></span>
        </button>
        <h1>{{$post->title}}</h1>
    </div>
</div>
    @if($post->cover_image != 'noimage.png')
        <div class="row mb-1">
            <div class="col-md-12 text-center">
                <img src="/storage/cover_images/{{$post->cover_image}}" alt="" style="width:15%">
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 mt-5">
            <p>{!!$post->body!!}</p>
        </div>
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
@endsection
