@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Book')
    
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Edit Book</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" value="{{ $book->image }}" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option>--Pilih Category--</option>
                                    @foreach ($categories as $category)
                                        @if ($book->category_id == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" value="{{ $book->judul }}" id="judul" class="form-control @error('judul') is-invalid @enderror">
                                @error('judul')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" value="{{ $book->penerbit }}" id="penerbit" class="form-control @error('penerbit') is-invalid @enderror">
                                @error('penerbit')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="pengarang" class="form-label">Pengarang</label>
                                <input type="text" name="pengarang" value="{{ $book->pengarang }}" id="pengarang" class="form-control @error('pengarang') is-invalid @enderror">
                                @error('pengarang')
                                    <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" name="tahun" value="{{ $book->tahun }}" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                                @error('tahun')
                                    <div class="alert alert-danger mb-1 mt-1 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-info float-end">Edit Book</button>
                                <a href="{{ route('book.index') }}" class="btn btn-warning float-end me-3">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection