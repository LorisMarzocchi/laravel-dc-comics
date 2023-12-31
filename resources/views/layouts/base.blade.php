<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/js/app.js')
</head>

<body>
    {{-- <img src="{{ Vite::asset('resources/img/picsum30.jpg') }}" alt=""> --}}
    <div class="container">
        <main>
            <a class="btn btn-primary" href="{{ route('home') }}">Home</a>
            <a class="btn btn-primary m-3" href="{{ route('comics.index') }}">Comics List</a>

            @yield('contents')
        </main>
    </div>
</body>

</html>
