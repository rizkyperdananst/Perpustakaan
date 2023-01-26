@extends('layouts.dashboard')
@section('title', 'Admin | Edit Peminjaman')
    
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Edit Peminjaman</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('borrow.update', $borrow->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="student_id" class="form-label">Student</label>
                                    <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror">
                                        <option>--- Pilih Student ---</option>
                                        @foreach ($students as $student)
                                            @if ($borrow->student_id = $student->id) 
                                                <option value="{{ $student->id }}" selected>{{ $student->nama }}</option>
                                            @else
                                                <option value="{{ $student->id }}">{{ $student->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('student_id')
                                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="book_id" class="form-label">Book</label>
                                    <select name="book_id" id="book_id" class="form-control @error('book_id') is-invalid @enderror">
                                        <option>--- Pilih Book ---</option>
                                        @foreach ($books as $book)
                                            @if ($borrow->book_id == $book->id)
                                                <option value="{{ $book->id }}" selected>{{ $book->judul }}</option>
                                            @else
                                                <option value="{{ $book->id }}">{{ $book->judul }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('book_id')
                                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="peminjaman" class="form-label">Peminjaman</label>
                                    <input type="text" name="peminjaman" value="{{ $peminjaman }}" id="peminjaman" class="form-control @error('peminjaman') @enderror" readonly>
                                    @error('peminjaman')
                                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="pengembalian" class="form-label">Pengembalian</label>
                                    <input type="text" name="pengembalian" value="{{ $pengembalian }}" id="pengembalian" class="form-control @error('pengembalian') @enderror" readonly>
                                    @error('pengembalian')
                                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="staff_id" class="form-label">Staff</label>
                                    <select name="staff_id" id="staff_id" class="form-control @error('staff_id') is-invalid @enderror">
                                        <option>--- Staff ---</option>
                                        @foreach ($staffs as $staff)
                                            @if ($borrow->staff_id == $staff->id)
                                                <option value="{{ $staff->id }}" selected>{{ $staff->nama }}</option>
                                            @else
                                                <option value="{{ $staff->id }}">{{ $staff->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('staff_id')
                                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" name="status" value="{{ $borrow->status }}" id="status" class="form-control @error('status') is-invalid @enderror">
                                    @error('status')
                                        <div class="alert alert-danger mt-1 mb-1 p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-info float-end ms-3">Add Borrow</button>
                                    <a href="{{ route('borrow.index') }}" class="btn btn-warning float-end">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection