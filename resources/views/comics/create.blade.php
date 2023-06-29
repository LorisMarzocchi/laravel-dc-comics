@extends('layouts.base')

@section('contents')
    <h1>Inserisci nuovo fumetto</h1>
    <form method="POST" action="{{ route('comics.store') }}">
        <div class="mb-3">
            <label for="titolo" class="form-label">Title</label>
            <input type="text" class="form-control" id="titolo">
        </div>

        <div class="mb-3">
            <label for="descrizione" class="form-label">Description</label>
            <textarea class="form-control" id="descrizione" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="src" class="form-label">Thumb</label>
            <input type="text" class="form-control" id="src">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Price</label>
            <input type="text" class="form-control" id="tipo">
        </div>

        <div class="mb-3">
            <label for="cottura" class="form-label">Series</label>
            <input type="text" class="form-control" id="cottura">
        </div>

        <div class="mb-3">
            <label for="start">Sale date:</label>

            <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31">
        </div>

        <div class="mb-3">
            <label for="cottura" class="form-label">Type</label>
            <input type="text" class="form-control" id="cottura">
        </div>



        <button class="btn btn-primary">Salva</button>
    </form>
@endsection
