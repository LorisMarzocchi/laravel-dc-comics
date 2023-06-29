
@extends('layouts.base')

@section('contents')


<h1>{{ $comic->title }}</h1>
<p>{{ $comic->description }}</p>
<img src="{{ $comic->thumb }}" alt="">
<p>{{ $comic->price }}</p>
<h5>{{ $comic->series }}</h5>
<h5>{{ date('d-m-Y', strtotime($comic->sale_date)) }}</h5>
<h5>{{ $comic->type }}</h5>


@endsection
