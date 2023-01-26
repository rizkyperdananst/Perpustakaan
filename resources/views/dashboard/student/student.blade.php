@extends('layouts.dashboard')
@section('title', 'Admin | Data Student')

@section('content')
    <div class="container-fluid">
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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">    
                            <h5 class="float-start fw-bold">Data Student</h5>
                            <a href="{{ route('create') }}" class="btn btn-info float-end ms-3 mb-2">Add Student</a>
                            <form action="" method="POST" class="float-end">
                                <input type="search" name="search" class="form-control" placeholder="Cari Nama">
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Profile</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Kelas</th>
                                        <th width="13%">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Profile</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Kelas</th>
                                        <th width="13%">Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $no= 1;
                                    @endphp
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><img src="{{ url('storage/students/', $student->profile) }}" alt="Profile" class="img img-fluid img-thumbnail" width="150"></td>
                                        <td>{{ $student->nama }}</td>
                                        <td>{{ $student->npm }}</td>
                                        <td>{{ $student->kelas }}</td>
                                        <td width="17%">
                                            <a href="/admin/show/{{ $student->id }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                            {{-- <a href="/admin/edit/{{ $student->id }}" class="btn btn-warning">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a> --}}
                                            <form action="/admin/delete/{{ $student->id }}" method="POST" class="d-inline">
                                                @csrf
                                                {{-- @method('delete') --}}
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