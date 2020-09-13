@extends('layouts.app')
@section('content')

        <div class="card">
            <div class="card-header text-center bg-secondary text-white">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button onclick="window.history.back()" class="btn btn-default back-btn">
                            <span class="oi oi-chevron-left text-white"></span>
                        </button>
                        <h4 class="mb-0">Skills</h4>
                    </div>
                </div>
            </div>
            @if(count($skills) > 0)
                <ul class="list-group list-group-flush text-dark">
                    @foreach($skills as $skill)
                        <li class="list-group-item skill-item">
                            <div class="row align-items-center skill-show">
                                {{-- <div class="col-md-4">
                                    <img src="/storage/category_images/{{$skill['cover_image']}}" alt="" style="width:15%">
                                </div> --}}
                                <div class="col-md-4 text-center">
                                    <h4 class="mb-0">{{$skill->name}}</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$skill->score}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$skill->score}}%</div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-default edit-skill">
                                        <span class="oi oi-pencil"></span>
                                    </button>
                                    <div class="d-inline-block">
                                        {!! Form::open(['action' => ['SkillsController@destroy', $skill->id], 'method' => 'POST', 'id' => 'del-skill']) !!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::button(
                                                '<span class="oi oi-trash"></span>',
                                                [
                                                    'type'=>'button',
                                                    'class' => 'btn btn-default del-skill-btn',
                                                    'data-toggle'=>'modal',
                                                    'data-target'=>'#confirmModal',
                                                    'data-type'=>'skill'
                                                ]
                                            )}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center edit-form">
                                {!! Form::open(['action' => ['SkillsController@update', $skill->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'updateSkillForm']) !!}
                                    <div class="form-group">
                                        {{Form::text('name', $skill->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::range('score', $skill->score, ['class' => 'form-control-range', 'placeholder' => 'Progress'])}}
                                    </div>
                                    {!! Form::hidden('_method','PUT') !!}
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-default cancel-skill-edit">Cancel</button>
                                {!! Form::close() !!}
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="row">
                    <div class="col-md-12 text-center pt-2 pb-2">
                        <div>There are no Skills yet. Please login and create some.</div>
                    </div>
                </div>
            @endif
        </div>

@endsection
