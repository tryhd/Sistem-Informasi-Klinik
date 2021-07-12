@extends('layout.master')
@extends('layout.header')
@extends('layout.sider')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Laporan Transaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    @include('layout.alerts')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Transaksi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan-pdf') }}" method="GET" autocomplete="on" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="mulai" value="{{ old('mulai') }}"
                            placeholder="Masukan tanggal mulai">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="akhir" value="{{ old('akhir') }}"
                            placeholder="Masukan tanggal akhir">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i>Cetak</button>
                    </div>
                </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Tindakan</th>
                        <th>Obat</th>
                        <th>Tagihan</th>
                        <th>Tanggal Transaksi</th>
                </thead>
                <tbody>
                    @php
                    $no= 1;
                    @endphp
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->medis->pasien->nama }}</td>
                        <td>{{ $row->medis->tindakan->jenis_tindakan }}</td>
                        <td>{{ $row->resep->obat->nama }}</td>
                        @php $price;
                        $price="Rp ".number_format($row->tagihan,2,',','.');
                        @endphp
                        <td>{{ $price }}</td>
                        @php
                        $newDate = date("d F Y", strtotime($row->created_at));
                        @endphp
                        <td>{{ $newDate }}</td>
                    </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
@extends('layout.footer')
