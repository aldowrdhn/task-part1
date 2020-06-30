@extends('layouts.master')
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $karyawan->count() }}</h3>

              <p>Employess</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('karyawan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $jabatan->count() }}</h3>

              <p>Position</p>
            </div>
            <div class="icon">
              <i class="fas fa-briefcase"></i>
            </div>
            <a href="{{ route('jabatan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $pendidikan->count() }}</h3>

              <p>Education</p>
            </div>
            <div class="icon">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <a href="{{ route('pendidikan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $status->count() }}</h3>

              <p>Status</p>
            </div>
            <div class="icon">
              <i class="fas fa-info"></i>
            </div>
            <a href="{{ route('status.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>
        <h1>Welcome , Admin</h1>
      </div>
    </div>
  </section>
@endsection
