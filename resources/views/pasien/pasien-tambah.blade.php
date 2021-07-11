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
                        <h4 class="header-title mb-2">Form Tambah Pasien</h4>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('pasien.store') }}" method="POST" autocomplete="off"
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
                                    <label for="inputName">Jenis Kelamin</label>
                                    <select id="inputStatus" name="jenis_kelamin" class="form-control custom-select">
                                        <option name="jenis_kelamin"  selected disabled>- Pilih -</option>
                                        <option name="jenis_kelamin" value="pria">Pria</option>
                                        <option name="jenis_kelamin" value="wanita">Wanita</option>
                                    </select>
                                    @if ($errors->has('jenis_kelamin'))
                                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
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
                                        placeholder="Masukan no telepon" name="telp" value="{{ old('telp') }}">
                                    @if ($errors->has('telp'))
                                    <span class="text-danger">{{ $errors->first('telp') }}</span>
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
                                    @if ($errors->has('wilayah'))
                                    <span class="text-danger">{{ $errors->first('wilayah') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputName">Pekerjaan</label>
                                    <input type="text" id="inputName" class="form-control" placeholder="pekerjaan"
                                        name="pekerjaan" value="{{ old('pekerjaan') }}">
                                    @if ($errors->has('pekerjaan'))
                                    <span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
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
