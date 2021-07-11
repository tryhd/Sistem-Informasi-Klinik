@extends('layout.master')
@extends('layout.header')
@extends('layout.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Kelola Obat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Obat</a></li>
                    <li class="breadcrumb-item active">Tambah Obat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header with-border">
                        <h4 class="header-title mb-2">Form Tambah Obat</h4>
                      </div>
                    <!-- form start -->
                    <form action="{{ route('obat.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Nama Obat</label>
                                    <input type="text" class="form-control" placeholder="Masukan nama obat" name="nama" value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input type="number" class="form-control"  placeholder="Masukan harga satuan obat" name="harga" value="{{ old('harga') }}">
                                    @if ($errors->has('harga'))
                                        <span class="text-danger">{{ $errors->first('harga') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Stok</label>
                                    <input type="number" class="form-control" placeholder="Masukan jumlah stok" name="stok" value="{{ old('stok') }}">
                                    @if ($errors->has('stok'))
                                        <span class="text-danger">{{ $errors->first('stok') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@extends('layout.footer')
