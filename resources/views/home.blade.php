@extends('master')
@section('title', 'Dashboard')
@section('karyawann','active')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-4 pb-4">
            <div class="col-sm-6"><h3>Data Karyawan</h3></div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a>
            </div>
        </div>
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-12">
                <table class="table table-hover table-info table-bordered" id="myTable">
                    <thead class="thead-dark text-center">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Number Phone</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Age</th>
                            <th>Education</th>
                            <th>Joined Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($karyawans as $karyawan)
                        <tr >
                            <td class="text-center"><strong>{{ $loop->iteration }}</strong></td>
                            <td>{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->jenis_kelamin }}</td>
                            <td class="text-center">+62{{ $item->telepon->nomor_telepon }}</td>
                            <td>{{ $item->jabatan->jabatan }}</td>
                            <td>{{ $item->status->status_karyawan}}</td>
                            <td class="text-center">{{ $item->umur }}</td>
                            <td class="text-center">{{ $item->pendidikan->pendidikan }}</td>
                            <td class="text-center">{{ $item->tanggal_masuk }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-info" data-toggle="modal" data-target="#EditPositionmodal{{ $loop->iteration }}"><i class="far fa-eye"></i></a>
                                    <div class="modal fade" id="EditPositionmodal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="EditPositionmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="EditPositionmodalLabel">Data Employess</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <img src="/img/avatar5.png" style="width:200px;" class="card-img-top" alt="pictur-employess">
                                                    <div class="card-body">
                                                      <h3>{{ $item->nama}}<h5>{{$item->jabatan->jabatan }}</h5></h3>
                                                      <br>
                                                        <table class="table">
                                                            <tr>
                                                                <td class="text-left"><strong>Status</strong></td>
                                                                <td>{{ $item->status->status_karyawan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>Sex</strong></td>
                                                                <td>{{ $item->jenis_kelamin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>Number Phone</strong></td>
                                                                <td>+62 {{ $item->telepon->nomor_telepon}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>Age</strong></td>
                                                                <td>{{ $item->umur}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>Education</strong></td>
                                                                <td>{{ $item->pendidikan->pendidikan}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left"><strong>Joined</strong></td>
                                                                <td>{{ $item->tanggal_masuk}}</td>
                                                            </tr>
                                                        </table>
                                                        <br>
                                                    <a class="btn btn-danger"href="{{ url('/karyawan/'.$item->id.'/edit/')}}">Edit</a>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <form action="{{ route('karyawan.destroy', ['karyawan' => $item->id]) }}" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                    </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="9" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
