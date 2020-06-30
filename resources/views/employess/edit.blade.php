@extends('layouts.master')
@section('content')
@section('indexEmployess','active')
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-danger">
      <div class="card-header">
        <h3 class="card-title">Edit Employess</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <form action="{{ url('admin/karyawan/'.$karyawan->id) }}" method="POST">
        @method('PATCH')
        @csrf
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label for="nama">Name Employess</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $karyawan->nama}}" disabled>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label>Sex</label>
                    <select name="jenis_kelamin"  class="form-control @error('jenis_kelamin') is-invalid @enderror" >
                        <option value="M" id="man" {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin)  == 'M' ? 'selected' : '' }}>
                            Man
                        </option>
                        <option value="W" id="woman" {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin)  == 'W' ?  'selected' : '' }}>
                            Woman
                        </option>
                        @error('jenis_kelamin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
                </div>
            </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
                <div class="form-group">
                    <label for="jabatan">Position</label>
                    <select name="jabatan_id" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                        @foreach ($jabatan as $position)
                            <option value="{{ $position->id }}" {{ (old('jabatan_id') ?? $karyawan->jabatan->jabatan) ==  $position->jabatan ? 'selected' : ' ' }}>
                            {{ $position->jabatan }}
                            </option>
                        @endforeach
                        @error('jabatan_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="status_id">Status</label>
                    <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror">
                        @foreach ($status as $statuse)
                            <option value="{{ $statuse->id }}" {{ (old('status_id') ?? $karyawan->status->status_karyawan) ==  $statuse->status_karyawan ? 'selected' : ' ' }}>
                            {{ $statuse->status_karyawan }}
                            </option>
                        @endforeach
                        @error('status_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label for="nomor_telepon">Number Phone</label>
                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') ?? $karyawan->telepon->nomor_telepon}}" placeholder="+62123456789" required>
                @error('nomor_telepon')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="umur">Age</label>
                <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{ old('umur') ?? $karyawan->umur }}" placeholder="36...">
                @error('umur')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label for="pendidikan_id">Education</label>
                    <select name="pendidikan_id" id="pendidikan_id" class="form-control  @error('pendidikan') is-invalid @enderror">
                        @foreach ($pendidikan as $educ)
                            <option value="{{ $educ->id }}" {{ (old('pendidikan_id') ?? $karyawan->pendidikan->pendidikan ) ==  $educ->pendidikan ? 'selected' : ' ' }}>
                            {{ $educ->pendidikan }}
                            </option>
                        @endforeach
                        @error('pendidikan_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </select>
              </div>
            </div>
            {{-- <div class="col-sm-6">
              <div class="form-group">
                <label for="tanggal_masuk">Joined</label>
                        <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') ?? date('Y/m/d', $date) }}">
                        @error('tanggal_masuk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
              </div>
            </div> --}}
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
