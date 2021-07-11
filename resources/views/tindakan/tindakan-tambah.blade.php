@extends('layout.master')
@extends('layout.header')
@extends('layout.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Kelola Tindakan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tindakan</a></li>
                    <li class="breadcrumb-item active">Tambah Tindakan</li>
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
                        <h4 class="header-title mb-2">Form Tambah Tindakan</h4>
                      </div>
                    <!-- form start -->
                    <form action="{{ route('tindakan.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Jenis Tindakan</label>
                                    <input type="text" class="form-control" placeholder="Masukan jenis tindakan" name="jenis_tindakan" value="{{ old('jenis_tindakan') }}">
                                    @if ($errors->has('jenis_tindakan'))
                                    <span class="text-danger">{{ $errors->first('jenis_tindakan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Tarif</label>
                                    <input type="number" class="form-control"  placeholder="Masukan tarif" name="tarif" value="{{ old('tarif') }}">
                                    @if ($errors->has('tarif'))
                                        <span class="text-danger">{{ $errors->first('tarif') }}</span>
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
