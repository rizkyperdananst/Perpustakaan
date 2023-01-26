@extends('layouts.dashboard')
@section('title', 'Admin | Add Data Category')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Add Data Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" placeholder="Masukkan Category">
                                @error('category')
                                    <div class="alert alert-danger mt-1 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-info float-end ms-2">Add Category</button>
                        <a href="{{ route('category.index') }}" class="btn btn-warning float-end">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</div>
    
@endsection