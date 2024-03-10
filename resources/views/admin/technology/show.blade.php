@extends('layouts.app')

@section('page-title', $technology->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-5">
                        {{$technology->title}}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    
@endsection