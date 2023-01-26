@extends('layouts.dashboard')
@section('title', 'Admin | Add Data Staff')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Add Staff</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('staff.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" value="{{ $jabatan }}" id="jabatan" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-info float-end ms-3">Add Staff</button>
                                <a href="{{ route('staff.index') }}" class="btn btn-warning float-end">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection