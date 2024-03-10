@extends('layouts.app')

@section('page-title', 'Tutti i Type')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-5">
                        Tutti i Type!
                    </h1>

                    <div class="mb-3">
                        <a href="{{ route('admin.types.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Creato il</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                            <tr>
                                <th scope="row">{{$type->id}} </th>
                                <td>{{$type->title}}</td>
                                <td>{{$type->created_at->format('H:i d/m/Y')}}</td>
                                <td>
                                    <a href="{{route('admin.types.show', ['type' => $type->id ])}}" class="btn btn-primary ">
                                        PULSANTE
                                    </a>

                                    <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-xs btn-warning">
                                        Modifica
                                    </a>

                                    <form class="d-inline-block" action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare?');">
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