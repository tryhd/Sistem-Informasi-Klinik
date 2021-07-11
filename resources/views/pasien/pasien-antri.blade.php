@extends('layout.master')
@extends('layout.header')
@extends('layout.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Kelola Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pasien</a></li>
                    <li class="breadcrumb-item active">Edit Pasien</li>
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
                        <h4 class="header-title mb-2">Form Tambah Antrian Pasien</h4>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('pasien.update',$data->id) }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nama Lengkap</label>
                                    <input type="text" id="inputName" class="form-control" placeholder="Nama lengkap"
                                        name="nama" value="{{ $data->nama }}" readonly>
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Layanan Dokter</label>
                                    <select id="dokter" name="dokter" class="form-control custom-select">
                                        <option name="dokter" selected disabled>- Pilih -</option>
                                        @foreach ($pegawai as $row)
                                        <option name="dokter" value="{{ $row->id }}"
                                            {{'dokter' == $row->id ? 'selected' : '' }}>{{ $row->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('dokter'))
                                    <span class="text-danger">{{ $errors->first('dokter') }}</span>
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
