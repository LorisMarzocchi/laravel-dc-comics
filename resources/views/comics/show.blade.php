@extends('layouts.base')

@section('contents')
    <div class="card border-0 text-center">
        <img src="{{ $comic->thumb }}" alt="">
        <div class="card-body">
            <h3>{{ $comic->title }}</h3>
            <p>{{ Str::limit($comic->description, 150, '...') }}</p>
            <h5>
                <span class="text-danger">Price:</span>
                {{ $comic->price }}
            </h5>
            <h5>
                <span class="text-danger">Series:</span>
                {{ $comic->series }}
            </h5>
            <h5>
                <span class="text-danger">Relese Date:</span>
                {{ date('d-m-Y', strtotime($comic->sale_date)) }}
            </h5>
            <h5>
                <span class="text-danger">Type:</span>
                {{ $comic->type }}
            </h5>







        </div>
    </div>
@endsection
