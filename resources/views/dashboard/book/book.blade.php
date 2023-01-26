@extends('layouts.dashboard')
@section('title', 'Admin | Data Book')
    
@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header ">
                    <h5 class="float-start">Data Book</h5>
                    <a href="{{ route('book.create') }}" class="btn btn-info float-end ms-3">Add Book</a>
                    <form action="{{ route('book.index') }}" method="GET" class="float-end">
                        @csrf
                        <input type="search" name="search" class="form-control" placeholder="Cari Judul">
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sampul</th>
                                    <th>Category</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Sampul</th>
                                    <th>Category</th>
                                    <th>Judul</th>
                                    <th>Penerbit</th>
                                    <th>Pengarang</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($books as $index => $book)
                                <tr>
                                    <td>{{ $index + $books->firstItem() }}</td>
                                    <td><img src="{{ url('storage/covers/', $book->image) }}" width="150" alt="" class="img img-fluid img-thumbnail border-dark"></td>
                                    <td>{{ $book->categories->category }}</td>
                                    <td>{{ $book->judul }}</td>
                                    <td>{{ $book->penerbit }}</td>
                                    <td>{{ $book->pengarang }}</td>
                                    <td>{{ $book->tahun }}</td>
                                    <td>
                                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        {{ $books->links() }}
    </div>
</div>
@endsection