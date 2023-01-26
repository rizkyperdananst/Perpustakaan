@extends('layouts.dashboard')
@section('title', 'Admin | Edit Data Student')
    
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Edit Data Student</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="profile" class="form-label">Profile</label>
                                <input type="file" name="profile"  id="profile" class="form-control @error('profile') is-invalid @enderror">
                                @error('profile')
                                    <div class="alert alert-danger mt-1 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" value="{{ $student->nama }}" id="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <div class="alert alert-danger mt-1 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="number" name="npm" id="npm" value="{{ $student->npm }}" value="{{ old('npm') }}" class="form-control @error('npm') is-invalid @enderror">
                                @error('npm')
                                    <div class="alert alert-danger mt-1 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" name="kelas" id="kelas" value="{{ $student->kelas }}" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
                                @error('kelas')
                                    <div class="alert alert-danger mt-1 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="form-group col-md-6">
                                <label for="fakultas" class="form-label">Fakultas</label>
                                <select class="form-select @error('fakultas') is-invalid @enderror" name="fakultas" id="sel_depart" aria-label="Default select example" onchange="handleStatus()">
                                    <option value="0">----- Fakultas -----</option>
                                    @foreach ($faculties as $fakultas)
                                        @if ($student->fakultas == $fakultas->fakultas)
                                            <option value="{{ $fakultas->id }}" selected>{{ $fakultas->fakultas }}</option>
                                        @else
                                            <option value="{{ $fakultas->id }}" >{{ $fakultas->fakultas }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('fakultas')
                                    <div class="alert alert-danger mt-1 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select class="form-select @error('jurusan') is-invalid @enderror" name="jurusan" id="sel_emp" aria-label="Default select example">
                                    <option value="0">----- Jurusan -----</option>
                                    {{-- @foreach ($majors as $jurusan)
                                        @if ($student->jurusan == $jurusan->jurusan)
                                            <option value="{{ $jurusan->id }}" selected>{{ $jurusan->jurusan }}</option>
                                        @else
                                            <option value="{{ $jurusan->id }}">{{ $jurusan->jurusan }}</option>
                                        @endif
                                    @endforeach --}}
                                    <option value=""></option>
                                </select>
                                @error('jurusan')
                                    <div class="alert alert-danger mt-1 mb-2 p-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info float-end ms-3">Edit Student</button>
                                <a href="{{ route('student') }}" class="btn btn-warning float-end">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    @push('scripts')
        {{-- <script>
            function handleStatus() {
                let fakultas = document.getElementById('fakultas').value;
                if( fakultas == 'Ilmu Komputer & Teknologi Informasi' ) {
                    document.getElementById('jurusan').removeAttribute('disabled');
                } else if( fakultas == 'Keguruan & Ilmu Pendidikan' ) {
                    document.getElementById('jurusan').removeAttribute('disabled');
                } else if( fakultas == 'Ekonomi & Bisnis' ) {
                    document.getElementById('jurusan').removeAttribute('disabled');
                } else {
                    document.getElementById('jurusan').setAttribute('disabled', true);
                }
            }
        </script> --}}

        <script type='text/javascript'>
            $(document).ready(function() {
                $('#sel_depart').change(function() {
                    // Department id
                    var id = $(this).val();
                    // alert(id);

                    // Empty the dropdown
                    $('#sel_emp').find('option').not(':first').remove();

                    // AJAX Request
                    $.ajax({
                        url: 'getJurusanEdit/'+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(response) {
                            var len = 0;
                            if(response['data'] != null) {
                                len = response['data'].length;
                            } 

                            if(len > 0) {
                                // Read data and create <option></option>
                                for(var i=0; i<len; i++) {
                                    var id = response['data'][i].id;
                                    var jurusan = response['data'][i].jurusan;
                                    var option = "<option value='"+id+"'>"+jurusan+"</option>";
                                    $("#sel_emp").append(option);
                                }
                            }
                        }
                    });
                })
            })
        </script>
    @endpush
@endsection