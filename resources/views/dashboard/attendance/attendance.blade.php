@extends('layouts.dashboard')
@section('title', 'Admin | Data Absensi')
    
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="float-start">Data Absensi</h5>
                        <a href="{{ route('attendance.create') }}" class="btn btn-info float-end ms-3">Add Absensi</a>
                        <form action="{{ route('attendance.index') }}" method="GET" class="float-end">
                            @csrf
                            <input type="search" name="search" id="" class="form-control" placeholder="Cari Nama">
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Kelas</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NPM</th>
                                        <th>Kelas</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $no= 1;
                                    @endphp
                                    @foreach ($attendances as $index => $attendance)
                                    <tr>
                                        <td>{{ $index + $attendances->firstItem() }}</td>
                                        <td>{{ $attendance->nama }}</td>
                                        <td>{{ $attendance->npm }}</td>
                                        <td>{{ $attendance->kelas }}</td>
                                        <td>{{ $attendance->jam }}</td>
                                        <td>{{ $attendance->tanggal }}</td>
                                        <td>{{ $attendance->keterangan }}</td>
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
            <div class="col-12">
                {{ $attendances->links() }}
            </div>
        </div>
    </div>
@endsection