@extends('layouts.master-dashboard')

@section('title', 'Sistem Absensi Kegiatan')


@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 small-9">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Manajemen user</a></li>
            <li class="breadcrumb-item active">Edit user</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row my-3">
        <div class="col-lg col-md-12">
          <div class="card card-primary small-9">
            <div class="card-header">
              <h5 class="card-title">Form Edit User</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('manajemen.user.update',$user->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control" placeholder="Nama lengkap" value="{{ !empty(old('nama')) ? old('nama') : $user->nama }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="Email" value="{{ !empty(old('email')) ? old('email') : $user->email }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Universitas</label>
                        <select name="id_univ" id="" class="form-control">
                            <option value="">-- Pilih Universitas --</option>
                            @foreach ($univ as $val)
                              @if(!empty(old('id_univ')))
                                  <option value="{{$val->id}}" {{ old('id_univ')==$val->id ? 'selected' : null }}>{{ $val->nama_univ }}</option>
                              @else
                                  <option value="{{$val->id}}" {{ $user->id_univ==$val->id ? 'selected' : null }}>{{ $val->nama_univ }}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Divisi</label>
                        <select name="id_divisi" id="" class="form-control">
                            <option value="">-- Pilih Divisi --</option>
                            @foreach ($divisi as $val)
                              @if( !empty(old('id_divisi')) )
                                <option value="{{$val->id}}" {{  old('id_divisi')==$val->id ? "selected" : null }} >{{ $val->nama_divisi }}</option>
                              @else
                                <option value="{{$val->id}}" {{  $user->id_divisi==$val->id ? "selected" : null }} >{{ $val->nama_divisi }}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Periode</label>
                        <select name="id_periode" id="" class="form-control">
                            <option value="">-- Pilih Periode --</option>
                            @foreach ($periode as $val)
                              @if( !empty(old('id_periode')) )
                                <option value="{{$val->id}}" {{  old('periode')==$val->id ? "selected" : null }} >{{ $val->periode }}</option>
                              @else
                                <option value="{{$val->id}}" {{  $user->id_periode==$val->id ? "selected" : null }} >{{ $val->periode }}</option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary px-3">Simpan</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
</div>
@endsection

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('scripts')
  <!-- DataTables -->
  <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection