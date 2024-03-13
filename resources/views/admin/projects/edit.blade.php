@extends('layouts.app')
@section('page-title', $project->title.' Edit')
@section('main-content')
<h1>
    {{ $project->title }} Edit
</h1>
<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                Torna all'index delle paste
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
            {{--
                C   Cross
                S   Site
                R   Request
                F   Forgery
            --}}
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" placeholder="Inserisci il titolo..." maxlength="255">
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select name="type_id" id="type_id" class="form-select">
                    <option
                        value=""
                        {{ old('type_id') == null ? 'selected' : '' }}>
                        Seleziona tipo
                    </option>
                    @foreach ($types as $type)
                        <option
                          value="{{ $type->id }}"
                            {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Inserisci il contenuto..." maxlength="10000" required>{{ old('content', $project->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tag</label>

                <div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input
                                {{-- Se c'è l'old, vuol dire che c'è stato un errore --}}
                                @if ($errors->any())
                                    {{-- Faccio le verifiche sull'old --}}
                                    {{ in_array($technology->id, old('technologys', [])) ? 'checked' : '' }}
                                @else
                                    {{-- Faccio le verifiche sulla collezione --}}
                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}
                                @endif
                                class="form-check-input"
                                type="checkbox"
                                id="technology-{{ $technology->id }}"
                                name="technologies[]"
                                value="{{ $technology->id }}">
                            <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-warning w-100">
                    Aggiorna
                </button>
            </div>
        </form>
    </div>
</div>
@endsection