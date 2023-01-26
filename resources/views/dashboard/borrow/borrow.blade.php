@extends('layouts.dashboard')
@section('title', 'Admin | Data Peminjaman')
    
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
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Peminjaman</h5>
                    <a href="{{ route('borrow.create') }}" class="btn btn-info">Add Peminjaman</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student</th>
                                    <th>Book</th>
                                    <th>Peminjaman</th>
                                    <th>Pengembalian</th>
                                    <th>Staff</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Student</th>
                                    <th>Book</th>
                                    <th>Peminjaman</th>
                                    <th>Pengembalian</th>
                                    <th>Staff</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($borrows as $borrow)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $borrow->students->nama }}</td>
                                    <td>{{ $borrow->books->judul }}</td>
                                    <td>{{ $borrow->peminjaman }}</td>
                                    <td>{{ $borrow->pengembalian }}</td>
                                    <td>{{ $borrow->staffs->nama }}</td>
                                    <td>{{ $borrow->status }}</td>
                                    <td>
                                        <a href="{{ route('borrow.edit', $borrow->id) }}" class="btn btn-warning">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('borrow.destroy', $borrow->id) }}" method="POST" class="d-inline">
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
</div>    
@endsection