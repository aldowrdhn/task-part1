@extends('layouts.master')
@section('content')
@section('indexStatus','active')
@section('page','Status')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Status Employess</h4>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-append card-title">
                    <a href="" data-toggle="modal" data-target="#AddstatusModal" class="btn btn-primary rounded">Add Status &nbsp;<i class="fas fa-plus-circle"></i></a>
                        <div class="modal fade" id="AddstatusModal" tabindex="-1" role="dialog" aria-labelledby="AddstatusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="AddstatusModalLabel">Add Status</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('status.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="status_karyawan">Position Employess</label>
                                        <select name="status_karyawan" id="status_karyawan" class="form-control" >
                                            <option value="Permanent Employess" {{ old('status_karyawan') == 'Permanent Employess' ? 'selected' : '' }}>
                                                Permanent Employess
                                            </option>
                                            <option value="Contract" {{ old('status_karyawan') == 'Contract' ? 'selected' : '' }}>
                                                Contract
                                            </option>
                                            <option value="Internship" {{ old('status_karyawan') == 'Internship' ? 'selected' : '' }}>
                                                Internship
                                            </option>
                                            @error('status_karyawan')
                                                <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </select>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($status as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->status_karyawan }}</td>
                        <td class="text-center">
                        <a class="btn btn-outline-info" data-toggle="modal" data-target="#EditstatusModal{{ $loop->iteration}}"><i class="fas fa-pen"></i></a>
                            <div class="modal fade" id="EditstatusModal{{ $loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="EditStatusmodalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="EditStatusmodalLabel">Edit Position</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('status.update', ['status' => $item->id]) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                              <div class="form-group">
                                                <label for="status_karyawan">Position Employess</label>
                                                <select name="status_karyawan" id="status_karyawan" class="form-control @error('status_karyawan') in-invalid @enderror" >
                                                    <option value="Permanent Employess" {{ (old('status_karyawan') ?? $item->status_karyawan ) == 'Permanent Employess' ? 'selected' : '' }}>
                                                        Permanent Employess
                                                    </option>
                                                    <option value="Contract" {{ (old('status_karyawan') ?? $item->status_karyawan ) == 'Contract' ? 'selected' : '' }}>
                                                        Contract
                                                    </option>
                                                    <option value="Internship" {{ (old('status_karyawan') ?? $item->status_karyawan ) == 'Internship' ? 'selected' : '' }}>
                                                        Internship
                                                    </option>
                                                </select>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                              </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <form action="{{ route('status.destroy', ['status' => $item->id]) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger text-center"><i class="fas fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
@endsection
