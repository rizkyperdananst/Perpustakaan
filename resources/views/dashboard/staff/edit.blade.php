@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Staff')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Edit Staff</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" value="{{ $staff->nama }}" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" value="{{ $staff->jabatan }}" name="jabatan" id="jabatan" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-info float-end ms-3">Edit Staff</button>
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