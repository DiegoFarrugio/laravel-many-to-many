@extends('layouts.guest')

@section('page-title', 'I nostri Project')

@section('main-content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-success mb-5">
                Tutti i Project!
            </h1>
        </div>

        @foreach ($projects as $project)
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        {{$project->title}}
                    </h4>

                    <a href="{{route('projects.show', ['project' => $project->slug])}}">
                        Leggi tutto
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    
@endsection