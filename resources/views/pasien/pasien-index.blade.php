@extends('layout.master')
@extends('layout.header')
@extends('layout.sider')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="fas fa-folder-open"> Kelola Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pasien</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Pasien</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        @include('layout.alerts')
                        <div class="card-body">
                            <td>
                                <a href="{{ route('pasien.create') }}"  type="button" class="btn btn-primary">Tambah Pasien Baru  <i class="fas fa-plus"></i></button></a>
                            </td>
                            <table id="example1" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Periksa Terakhir</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $no= 1;
                                @endphp
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->alamat }} {{$row->wilayah->kecamatan}}, {{$row->wilayah->kota}}</td>
                                    <td>{{$row->updated_at}}</td>
                                    <td>   <a class="btn btn-info btn-sm" href="{{ route('pasien.edit',$row->id) }}"> <i class="fas fa-pencil-alt">
                                        </i>Tambah Atrian</a>
                                        <form action="{{route('pasien.destroy',$row->id)}}" method="post" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button></form>
                                    </td>
                                </tr>
                                @endforeach
                                </tfoot>
                              </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>
            <div class="col-md-3">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Pasien dalam antrian</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $no= 1;
                            @endphp
                            @foreach ($antri as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nama }}</td>
                            </tr>
                            @endforeach
                            </tfoot>
                          </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

    <!-- Main content -->
    <!-- /.content -->
  <!-- /.content-wrapper -->
@endsection
@extends('layout.footer')
