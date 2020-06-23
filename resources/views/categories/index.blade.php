@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <button onclick="window.history.back()" class="btn btn-default back-btn">
                <span class="oi" data-glyph="chevron-left"></span>
            </button>
            <h5>Edit Categories</h5>
        </div>
    </div>
        {{-- {{dd($categories)}} --}}
        <div class="card">
            @if(count($categories) > 0)
                <ul class="list-group list-group-flush">
                    @foreach($categories as $category)
                        <li class="list-group-item bg-secondary text-white mb-3">
                            <div class="row align-items-center mb-3">
                                <div class="col-md-4">
                                    <img src="/storage/category_images/{{$category['cover_image']}}" alt="" style="width:15%">
                                </div>
                                <div class="col-md-4 text-center">
                                    <h4>{{$category['name']}}</h4>
                                </div>
                                <div class="col-md-4 text-right">

                                    <a href="/categories/{{$category['id']}}/edit" class="btn btn-default text-white">
                                        <span class="oi oi-pencil"></span>
                                    </a>
                                    <div class="d-inline-block">
                                        {!! Form::open(['action' => ['CategoriesController@destroy', $category['id']], 'method' => 'POST', 'id' => 'del-parentcat']) !!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::button(
                                                '<span class="oi oi-trash"></span>',
                                                [
                                                    'type'=>'button',
                                                    'class' => 'btn btn-default text-white',
                                                    'data-toggle'=>'modal',
                                                    'data-target'=>'#confirmModal',
                                                    'data-type'=>'parentcat'
                                                ]
                                            )}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($category['subCategories'] as $cat)
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <img src="/storage/category_images/{{$cat['cover_image']}}" alt="" style="width:15%">
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <h4>{{$cat['name']}}</h4>
                                            </div>
                                            <div class="col-md-4 text-right">

                                                <a href="/categories/{{$cat['id']}}/edit" class="btn btn-default">
                                                    <span class="oi oi-pencil"></span>
                                                </a>
                                                <div class="d-inline-block">
                                                    {!! Form::open(['action' => ['CategoriesController@destroy', $cat['id']], 'method' => 'POST', 'id' => 'del-category']) !!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::button(
                                                            '<span class="oi oi-trash"></span>',
                                                            [
                                                                'type'=>'button',
                                                                'class' => 'btn btn-default',
                                                                'data-toggle'=>'modal',
                                                                'data-target'=>'#confirmModal',
                                                                'data-type'=>'category'
                                                            ]
                                                        )}}
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="row">
                    <div class="col-md-12 text-center pt-2 pb-2">
                        <div>There are no Categories yet. Please login and create some.</div>
                    </div>
                </div>
            @endif
        </div>

@endsection
