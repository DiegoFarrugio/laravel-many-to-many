@extends('layouts.app')

@section('page-title', 'Tutti i Project')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-5">
                        Tutti i Project!
                    </h1>

                    <div class="mb-3">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Type</th>
                            <th scope="col">Technology</th>
                            <th scope="col">Creato il</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{$project->id}} </th>
                                <td>{{$project->title}}</td>
                                <td>
                                    @if ($project->type != null)
                                            <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">
                                                {{ $project->type->title }}
                                            </a>
                                        @else
                                            -
                                        @endif
                                </td>
                                <td>
                                    @forelse ($project->technologies as $technology)
                                    <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}">
                                        <span class="badge text-bg-primary">{{$technology->title}}</span>
                                    @empty
                                        -  
                                    @endforelse
                                </td>
                                <td>{{$project->created_at->format('H:i d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('admin.projects.show', ['project' => $project->id ])}}" class="btn btn-primary ">
                                        PULSANTE
                                    </a>

                                    <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-xs btn-warning">
                                        Modifica
                                    </a>

                                    <form class="d-inline-block" action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Elimina
                                        </button>
                                    </form>

                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    
                    
                

                </div>
            </div>
        </div>
    </div>

    
@endsection