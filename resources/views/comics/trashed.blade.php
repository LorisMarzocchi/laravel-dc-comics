@extends('layouts.base')

@section('contents')
    <h1 class="text-center text-danger p-3">Comics Trash:</h1>

    @if (session('delete_success'))
        @php $comic = session('delete_success') @endphp

        <div class="alert alert-danger">
            The comic '{{ $comic->title }}' was deleted outright

        </div>
    @endif


    @if (session('restore_success'))
        @php
            $comic = session('restore_success');
        @endphp
        <div class="alert alert-success">
            Comic '{{ $comic->title }}' has been restored

        </div>
    @endif

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
            @foreach ($trashedComics as $comic)
                <tr>
                    <th scope="row">{{ $comic->title }}</th>
                    <td>{{ $comic->price }}</td>
                    <td>{{ $comic->series }}</td>
                    <td>{{ date('d-m-Y', strtotime($comic->sale_date)) }}</td>
                    <td>
                        {{-- <a class="btn btn-primary" href="{{ route('comics.show', ['comic' => $comic->id]) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Edit</a> --}}
                        <form class=" d-inline-block " action="{{ route('comics.restore', ['comic' => $comic->id]) }}"
                            method="POST">
                            @csrf
                            <button class="btn btn-success">Restore</button>
                        </form>


                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Hard Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Action</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to proceed with the deletion? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form class=" d-inline-block "
                                            action="{{ route('comics.hardDelete', ['comic' => $comic->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-success">Hard Delete</button>
                                            {{-- <button class="btn btn-success"
                                                onclick="return confirm('Are you sure you want to permanently delete this resource?')">Hard
                                                Delete</button> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $trashedComics->links() }}
@endsection
