@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center bg-secondary text-white">
            <div class="row">
                <div class="col-md-12 text-center">
                    <button onclick="window.history.back()" class="btn btn-default back-btn">
                        <span class="oi oi-chevron-left text-white"></span>
                    </button>
                    <h4 class="mb-0">Calendar</h4>
                </div>
            </div>
        </div>
        <div class = "clickad-dpck-container">
			<div id = "clickad-dpck">
			<!-- Date Picker created here -->
			</div>
		</div>
    </div>
@endsection
