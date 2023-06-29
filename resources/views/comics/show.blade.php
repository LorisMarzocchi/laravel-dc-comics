
@extends('layouts.base')

@section('contents')

<div class="card p-2 mt-3" style="width: 20rem;">
    <img src="{{ $comic->thumb }}" alt="">
    <div class="card-body">
        <h1>{{ $comic->title }}</h1>
        <p>{{ Str::limit($comic->description, 150, '...') }}</p>
        <p>{{ $comic->price }}</p>
        <h5>{{ $comic->series }}</h5>
        <h5>{{ date('d-m-Y', strtotime($comic->sale_date)) }}</h5>
        <h5>{{ $comic->type }}</h5>
    </div>
  </div>


@endsection
