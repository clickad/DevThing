@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <div class="card mb-5">
                        <div class="card-header text-center">
                            <span class="category-name">{{$category['name']}}</span>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                @if(count($category['subCategories']) > 0)
                                    @foreach($category['subCategories'] as $sCategory)
                                        <div class="col-md-3 flex-center mt-3">
                                            <a href="/posts/category/{{$sCategory['id']}}" class="col-md-12 flex-column flex-center-end category-item">
                                                <div class="text-center">
                                                    <img src="/storage/category_images/{{$sCategory['cover_image']}}" alt="" style="width:30%">
                                                </div>
                                                <div class="text-center">
                                                    {{$sCategory['name']}}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
