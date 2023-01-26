@extends('layouts.dashboard')
@section('title','Admin | Data Staff')
    
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
                    <h5>Data Staff</h5>
                    <a href="{{ route('staff.create') }}" class="btn btn-info">Add Staff</a>
                </div>
                <div class="card-body">
                    <div class="table responsive">
                        <table class="table table-bordered hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no= 1;
                                @endphp
                                @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $staff->nama }}</td>
                                    <td>{{ $staff->jabatan }}</td>
                                    <td>
                                        <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" class="d-inline">
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