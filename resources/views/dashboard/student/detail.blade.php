@extends('layouts.dashboard')
@section('title', 'Admin | Detail Student')
    
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Detail Data Student</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>Profile</th>
                                    <td><img src="{{ url('storage/students/', $student->profile) }}" alt="Profile" class="img img-fluid img-thumbnail" width="200px"></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $student->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NPM</th>
                                    <td>{{ $student->npm }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $student->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Fakultas</th>
                                    <td>{{ $student->fakultas }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $student->jurusan }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('student') }}" class="btn btn-warning float-end">Kembali</a>
                    </div>   
                </div>
            </div>
        </div>
    </div>
     
@endsection