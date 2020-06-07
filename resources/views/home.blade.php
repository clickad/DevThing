@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <span>Categories</span>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <div class="col-md-4 flex-center mt-3">
                                <div class="col-md-12 flex-column flex-center-end category-item">
                                    <div class="text-center">
                                        <img src="/storage/category_images/{{$category->cover_image}}" alt="" style="width:50%">
                                    </div>
                                    <div class="text-center">
                                        <a href="/posts/category/{{$category->id}}">{{$category->name}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
