@extends('layouts.base')

@section('contents')
    <h1>Inserisci nuovo fumetto</h1>
    <form method="POST" action="{{ route('comics.store') }}">
        @csrf
        <div class="mb-3">
            <label for="titolo" class="form-label">Title</label>
            <input type="text" class="form-control" id="titolo" name="title">
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Description</label>
            <textarea class="form-control" id="descrizione" rows="3" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="src" class="form-label">Thumb</label>
            <input type="text" class="form-control" id="src" name="thumb">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price">
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" id="series" name="series">
        </div>

        <div class="mb-3">
            <label for="start" >Sale date:</label>

            <input type="date" id="start" name="Sale_date" value="2018-07-22" min="2018-01-01" max="2018-12-31">
        </div>

        <div class="mb-3">
            <label for="cottura" class="form-label">Type</label>
            <input type="text" class="form-control" id="cottura">
        </div>



        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
