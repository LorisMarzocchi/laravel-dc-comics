@extends('layouts.base')

@section('contents')
    <h1 class="text-center text-danger p-3">Comics List:</h1>
    @if (session('delete_success'))
        @php $comic = session('delete_success') @endphp
        <div class="alert alert-danger">
            The comic "{{ $comic->title }}" has been cancelled
            <form action="{{ route('comics.restore', ['comic' => $comic]) }}" method="POST" class="d-inline-block">
                @csrf
                <button class="btn btn-warning">Ripristina</button>
            </form>
        </div>
    @endif

    {{-- @if (session('restore_success'))
        @php $comic = session('restore_success') @endphp
        <div class="alert alert-success">
            The comic "{{ $comic->title }}" has been restored
        </div>
    @endif --}}
    <a class="btn btn-primary m-3" href="{{ route('comics.create') }}">Add New Comic</a>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Series</th>
                <th scope="col">Sale date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <th scope="row">{{ $comic->title }}</th>
                    <td>{{ $comic->price }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ date('d-m-Y', strtotime($comic->sale_date)) }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('comics.show', ['comic' => $comic->id]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Edit</a>
                        <form class=" d-inline-block " action="{{ route('comics.destroy', ['comic' => $comic->id]) }}"
                            method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $comics->links() }}

    {{--
    paginator noBootstrap
    <div>
        <ul>
            @for ($i = 1; $i <= $comics->lastPage(); $i++)
            <li>
                <a href="/comics?page={{ $i }}">{{ $i }}</a>
            </li>
            @endfor
        </ul>
  </div> --}}
@endsection
