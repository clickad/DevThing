@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center bg-secondary text-white">
            <div class="row">
                <div class="col-md-12 text-center">
                    <button onclick="window.history.back()" class="btn btn-default back-btn">
                        <span class="oi oi-chevron-left text-white"></span>
                    </button>
                    <h4 class="mb-0">Todos</h4>
                </div>
            </div>
        </div>
        @if(count($todos) > 0)
            <ul class="list-group list-group-flush">
                @foreach($todos as $todo)
                    @if($todo->status == 1)
                        <li class="list-group-item list-group-item-success">
                        <span class="oi oi-check text-success h3"></span>
                    @else
                        <li class="list-group-item">
                    @endif
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <small>
                                    Written on {{date('d-M-y', strtotime($todo->created_at))}} Created by: {{$todo->name}}
                                </small>
                            </div>
                            <div class="col-md-6 text-center">
                                <h4 class="text-bold">{{$todo->title}}</h4>
                                <p>{{$todo->description}}</p>
                            </div>
                            <div class="col-md-3 text-right">
                                @auth
                                    @if($todo->status == 0)
                                        <div class="d-inline-block">
                                            {!! Form::open(['action' => ['TodoController@changeStatus', $todo->id, 1], 'method' => 'POST']) !!}
                                                {{Form::hidden('_method','PUT')}}
                                                {{Form::submit('Complete', ['class' => 'btn btn-default text-success'])}}
                                            {!! Form::close() !!}
                                        </div>
                                    @else
                                        <div class="d-inline-block">
                                            {!! Form::open(['action' => ['TodoController@changeStatus', $todo->id, 0], 'method' => 'POST']) !!}
                                                {{Form::hidden('_method','PUT')}}
                                                {{Form::submit('Activate', ['class' => 'btn btn-default'])}}
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                    @if($todo->status == 0)
                                        <a href="/todo/{{$todo->id}}/edit" class="btn btn-default">
                                            <span class="oi oi-pencil"></span>
                                        </a>
                                        {{-- <div class="d-inline-block">
                                            {!! Form::open(['action' => ['TodoController@destroy', $todo->id], 'method' => 'POST']) !!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::button('<span class="oi oi-trash"></span>', ['type' => 'submit', 'class' => 'btn btn-default'])}}
                                            {!! Form::close() !!}
                                        </div> --}}
                                        <div class="d-inline-block">
                                            {!! Form::open(['action' => ['TodoController@destroy', $todo->id], 'method' => 'POST', 'id'=>'del-todo']) !!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::button(
                                                    '<span class="oi oi-trash"></span>',
                                                    [
                                                        'type' => 'button',
                                                        'class' => 'btn btn-default',
                                                        'data-toggle'=>'modal',
                                                        'data-target'=>'#confirmModal',
                                                        'data-type' => 'todo'
                                                    ]
                                                )}}
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="row">
                <div class="col-md-12 text-center pt-2 pb-2">
                    <div>There are no Todos at this Time.</div>
                </div>
            </div>
        @endif
    </div>
@endsection
