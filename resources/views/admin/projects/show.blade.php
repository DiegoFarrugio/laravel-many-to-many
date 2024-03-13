@extends('layouts.app')

@section('page-title', $project->tile)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-5">
                        {{$project->title}}
                    </h1>

                    @if ($project->type != null)
                        <h2>
                            Tipo:
                            <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">
                                {{ $project->type->title }}
                            </a>
                        </h2>
                    @endif

                    <div>
                        @forelse ($project->technologies as $technology)
                             <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}">
                                <span class="badge text-bg-primary">{{$technology->title}}</span>
                        @empty
                        -  
                        @endforelse
                    </div>

                    <p>
                        {{$project->content}}
                    </p>

                </div>
            </div>
        </div>
    </div>

    
@endsection