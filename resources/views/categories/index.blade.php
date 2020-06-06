@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>Categories</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="/categories/create" class="btn btn-default">Add Category</a>
        </div>
    </div>
    @if(count($categories) > 0)
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/storage/category_images/{{$category->cover_image}}" alt="" style="width:20%">
                            </div>
                            <div class="col-md-4 text-center">
                                <h4>{{$category->name}}</h4>
                            </div>
                            <div class="col-md-4 text-right">

                                <a href="/categories/{{$category->id}}/edit" class="btn btn-default">Edit</a>
                                <div class="d-inline-block">
                                    {!! Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-default'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
    @endif
@endsection
