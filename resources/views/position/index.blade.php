@extends('layouts.master')
@section('content')
@section('indexPosition','active')
@section('page','Position')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Position Employess</h4>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-append card-title">
                    <a href="" data-toggle="modal" data-target="#AddPositionModal" class="btn btn-primary rounded">Add Status &nbsp;<i class="fas fa-plus-circle"></i></a>
                        <div class="modal fade" id="AddPositionModal" tabindex="-1" role="dialog" aria-labelledby="AddPositionModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="AddPositionModalLabel">Add Status</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('jabatan.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="jabatan">Position</label>
                                            <input type="text" class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="">
                                            @error('jabatan')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
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
                    @foreach ($jabatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td class="text-center">
                            <a class="btn btn-outline-info" data-toggle="modal" data-target="#EditPositionModal{{ $loop->iteration}}"><i class="fas fa-pen"></i></a>
                            <div class="modal fade" id="EditPositionModal{{ $loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="EditPositionModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="EditPositionModalLabel">Edit Position</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('jabatan.update',[$item->id]) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <div class="form-group">
                                                <label for="jabatan">Position</label>
                                                <input type="text" class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ $item->jabatan }}">
                                                @error('jabatan')
                                                <div class="text-danger">{{$message}}</div>
                                                @enderror
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
                            <form action="{{ route('jabatan.destroy', ['jabatan' => $item->id]) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger "><i class="fas fa-trash"></i></button>
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
