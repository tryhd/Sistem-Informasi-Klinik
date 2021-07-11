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
                        <h4 class="header-title mb-2">Form Tambah Pegawai</h4>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('pegawai.store') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Nama Lengkap</label>
                                    <input type="text" id="inputName" class="form-control" placeholder="Nama lengkap"
                                        name="nama" value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Tanggal Lahir</label>
                                    <input type="date" id="inputName" class="form-control"
                                        placeholder="Masukan tanggal lahir" name="tgl_lahir"
                                        value="{{ old('tgl_lahir') }}">
                                    @if ($errors->has('tgl_lahir'))
                                    <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">No Telepon</label>
                                    <input type="number" id="inputName" class="form-control"
                                        placeholder="Masukan no telepon" name="no_tlp" value="{{ old('no_tlp') }}">
                                    @if ($errors->has('no_tlp'))
                                    <span class="text-danger">{{ $errors->first('no_tlp') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Alamat</label>
                                    <input type="text" id="inputName" class="form-control" placeholder="Alamat" rows="2"
                                        name="alamat" value="{{ old('alamat') }}">
                                    @if ($errors->has('alamat'))
                                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Wilayah</label>
                                    <select id="inputStatus" name="wilayah" class="form-control custom-select">
                                        <option name="wilayah" selected disabled>- Pilih -</option>
                                        @foreach ($wilayah as $row)
                                        <option name="wilayah" value="{{ $row->id }}"
                                            {{'wilayah' == $row->id ? 'selected' : '' }}>{{ $row->kecamatan }},
                                            {{ $row->kota }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kelurahan'))
                                    <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Email</label>
                                    <input type="email" id="inputName" class="form-control" placeholder="email" rows="2"
                                        name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Password</label>
                                    <input type="password" id="inputName" class="form-control" placeholder="Password"
                                        rows="2" name="password" value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Jabatan</label>
                                    <select name="jabatan" id="" class="form-control custom-select">
                                        <option selected disabled>- Pilih -</option>
                                        <option name="jabatan" value="Manager">Manager</option>
                                        <option name="jabatan" value="Dokter">Dokter</option>
                                        <option name="jabatan" value="Resepsionis">Resepsionis</option>
                                        <option name="jabatan" value="Apoteker">Apoteker</option>
                                        <option name="jabatan" value="Admin">Admin</option>
                                    </select>
                                    @if ($errors->has('jabatan'))
                                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="photo" value="{{ old('photo') }}">
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
