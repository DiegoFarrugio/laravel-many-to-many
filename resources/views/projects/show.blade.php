@extends('layouts.guest')

@section('page-title', $project->tile)

@section('main-content')
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-3">
                        {{$project->tile}}
                    </h1>

                    <p>
                        {{$project->content}}
                    </p>
                </div>
            </div>
        </div>
    </div>

    
@endsection