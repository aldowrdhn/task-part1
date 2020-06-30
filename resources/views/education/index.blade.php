@extends('layouts.master')
@section('content')
@section('indexEducation','active')
@section('page','Education')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Education Employess</h4>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <div class="input-group-append card-title">
                    <a href="" data-toggle="modal" data-target="#AddPositionmodal" class="btn btn-primary rounded">Add Education &nbsp;<i class="fas fa-plus-circle"></i></a>
                        <div class="modal fade" id="AddPositionmodal" tabindex="-1" role="dialog" aria-labelledby="AddPositionmodalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="AddPositionmodalLabel">Add Education Employess</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('pendidikan.store') }}" method="POST">
                                    @csrf
                                      <div class="form group">
                                        <label for="pendidikan">Education Employess</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control" >
                                            <option value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>
                                                SD
                                            </option>
                                            <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>
                                                SMP
                                            </option>
                                            <option value="SMA/SMK" {{ old('pendidikan') == 'SMA/SMK' ? 'selected' : '' }}>
                                                SMA/SMK
                                            </option>
                                            <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>
                                                D3
                                            </option>
                                            <option value="S1" {{ old('pendidikan') == 'S1' ? 'selected' : '' }}>
                                                S1
                                            </option>
                                            <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>
                                                S2
                                            </option>
                                            <option value="S3" {{ old('pendidikan') == 'S3' ? 'selected' : '' }}>
                                                S3
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
                    @foreach ($pendidikans as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                                 @if ($item->pendidikan=='SD')
                                    <h5><span class="badge badge-danger">{{ $item->pendidikan }}</span></h5>
                                    @endif
                                    @if ($item->pendidikan=='SMP')
                                    <h5><span class="badge badge-primary">{{ $item->pendidikan }}</span></h5>
                                    @endif
                                    @if ($item->pendidikan=='SMA/SMK')
                                    <h5><span class="badge badge-dark">{{ $item->pendidikan }}</span></h5>
                                    @endif
                                    @if ($item->pendidikan=='D3')
                                    <h5><span class="badge badge-warning">{{ $item->pendidikan }}</span></h5>
                                    @endif
                                    @if ($item->pendidikan=='S1')
                                    <h5><span class="badge badge-success">{{ $item->pendidikan }}</span></h5>
                                    @endif
                                    @if ($item->pendidikan=='S2')
                                    <h5><span class="badge badge-success">{{ $item->pendidikan }}</span></h5>
                                    @endif
                                    @if ($item->pendidikan=='S3')
                                    <h5><span class="badge badge-success">{{ $item->pendidikan }}</span></h5>
                                    @endif
                        </td>
                        <td class="text-center">
                            <a class="btn btn-outline-info" data-toggle="modal" data-target="#EditPositionmodal{{ $loop->iteration}}"><i class="fas fa-pen"></i></a>
                            <div class="modal fade" id="EditPositionmodal{{ $loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="EditPositionmodalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="EditPositionmodalLabel">Edit Position</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pendidikan.update', ['pendidikan' => $item->id]) }}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                              <div class="form group">
                                                <label for="pendidikan">Position Employess</label>
                                                <select name="pendidikan" id="pendidikan" class="form-control" >
                                                    <option value="SD" {{ (old('pendidikan') ?? $item->pendidikan ) == 'SD' ? 'selected' : '' }}>
                                                        SD
                                                    </option>
                                                    <option value="SMP" {{ (old('pendidikan') ?? $item->pendidikan ) == 'SMP' ? 'selected' : '' }}>
                                                        SMP
                                                    </option>
                                                    <option value="SMA/SMK" {{ (old('pendidikan') ?? $item->pendidikan ) == 'SMA/SMK' ? 'selected' : '' }}>
                                                        SMA/SMK
                                                    </option>
                                                    <option value="D3" {{ (old('pendidikan') ?? $item->pendidikan ) == 'D3' ? 'selected' : '' }}>
                                                        D3
                                                    </option>
                                                    <option value="S1" {{ (old('pendidikan') ?? $item->pendidikan ) == 'S1' ? 'selected' : '' }}>
                                                        S1
                                                    </option>
                                                    <option value="S2" {{ (old('pendidikan') ?? $item->pendidikan ) == 'S2' ? 'selected' : '' }}>
                                                        S2
                                                    </option>
                                                    <option value="S3" {{ (old('pendidikan') ?? $item->pendidikan ) == 'S3' ? 'selected' : '' }}>
                                                        S3
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
                            <form action="{{ route('pendidikan.destroy', ['pendidikan' => $item->id]) }}" method="POST" class="d-inline-block">
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
