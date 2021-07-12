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
            <h1 class="fas fa-folder-open"> Kelola Tagihan Resep Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Resep</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Tagihan Resep Obat</h3>
        </div>
        @include('layout.alerts')
        <div class="card-body">
            <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Obat</th>
                    <th>Harga Obat</th>
                    <th>Biaya Penanganan</th>
                    <th>Total Tagihan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($faktur as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->medis->pasien->nama }}</td>
                    <td>{{ $row->resep->Obat->nama }}</td>
                    @php $ho;
                    $ho="Rp ".number_format($row->resep->Obat->harga,2,',','.');
                    @endphp
                    <td>{{ $ho }}</td>
                    @php $tt;
                    $tt="Rp ".number_format($row->medis->tindakan->tarif,2,',','.');
                    @endphp
                    <td>{{ $tt }}</td>
                    @php $price;
                    $price="Rp ".number_format($row->tagihan,2,',','.');
                    @endphp
                    <td>{{ $price }}</td>
                    @if ($row->resep->status=="selesai")
                        <td>Tagihan dan Obat Sudah Dibayar</td>
                        <td>    <button class="btn btn-primary" disabled><i class="fas fa-pencil-alt"></i> Serahkan dan Bayar</button>
                    </td>
                    @else
                        <td>Tagihan dan Obat Belum Dibayar</td>
                        <td>   <a class="btn btn-info btn-sm" href="{{ route('resep.edit',$row->resep_id) }}"> <i class="fas fa-pencil-alt">
                        </i>Serahkan dan Bayar</a>
                        </td>
                    @endif

                </tr>
                @endforeach
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
@endsection
@extends('layout.footer')
