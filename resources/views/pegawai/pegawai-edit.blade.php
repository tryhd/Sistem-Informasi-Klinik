@extends('layout.master')
@extends('layout.header')
@extends('layout.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Kelola Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
                    <li class="breadcrumb-item active">Edit Pegawai</li>
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
                        <h4 class="header-title mb-2">Form Edit Pegawai</h4>
                      </div>
                    <!-- form start -->
                    <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">Nama Lengkap</label>
                                <input type="text" id="inputName" class="form-control"
                                    name="nama" value="{{ $pegawai->nama }}">
                                @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Tanggal Lahir</label>
                                <input type="date" id="inputName" class="form-control"
                                     name="tgl_lahir" value="{{ $pegawai->tgl_lahir }}">
                                @if ($errors->has('tgl_lahir'))
                                <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">No Telepon</label>
                                <input type="number" id="inputName" class="form-control"
                                     name="no_tlp" value="{{ $pegawai->no_tlp }}">
                                @if ($errors->has('no_tlp'))
                                <span class="text-danger">{{ $errors->first('no_tlp') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Alamat</label>
                                <input type="text" id="inputName" class="form-control"
                                    name="alamat" value="{{ $pegawai->alamat }}">
                                @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Wilayah</label>
                                <select id="inputStatus" name="wilayah" class="form-control custom-select">
                                    <option name="wilayah" selected disabled>- Pilih -</option>
                                    @foreach ($wilayah as $row)
                                    <option name="wilayah" value="{{ $row->id }}" {{$pegawai->wilayah_id == $row->id  ? 'selected' : '' }}>{{ $row->kecamatan }}, {{ $row->kota }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('wilayah'))
                                <span class="text-danger">{{ $errors->first('wilayah') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Jabatan</label>
                                <input name="jabatan" id="" class="form-control" value="{{ $pegawai->jabatan }}" readonly>
                                @if ($errors->has('jabatan'))
                                <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                            name="photo" value="{{ $pegawai->photo }}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
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
