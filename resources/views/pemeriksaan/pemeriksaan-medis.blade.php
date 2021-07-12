@extends('layout.master')
@extends('layout.header')
@extends('layout.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Permeriksaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
                    <li class="breadcrumb-item"><a href="#">Pengajuan KK</a></li>
                    <li class="breadcrumb-item active">Pembuatan KK</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('pemeriksaan.update',$pasien->id) }}" method="POST" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                @method('Put')
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Rekam Medis Pasin</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nama Lengkap</label>
                                <input type="nama" id="inputName" class="form-control" name="suami" value="{{ $pasien->nama }}" readonly>
                                @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputName">Berat Badan</label>
                                <div class="input-group">

                                    <input type="number" id="inputName" class="form-control"
                                     name="bb" value="{{ old('bb') }}">
                                     <div class="input-group-append">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                                @if ($errors->has('bb'))
                                <span class="text-danger">{{ $errors->first('bb') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputName">Tinggi Badan</label>
                                <div class="input-group">
                                    <input type="number" id="inputName" class="form-control"
                                        name="tb" value="{{ old('tb') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                </div>
                                @if ($errors->has('tb'))
                                <span class="text-danger">{{ $errors->first('tb') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputName">Tensi Darah</label>
                                <div class="input-group">

                                    <input type="number" id="inputName" class="form-control" name="tensi"
                                       value="{{ old('tensi') }}" >
                                       <div class="input-group-append">
                                        <span class="input-group-text">mmHg</span>
                                    </div>
                                </div>
                                @if ($errors->has('tensi'))
                                <span class="text-danger">{{ $errors->first('tensi') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputName">Alergi Obat</label>
                                <select id="inputStatus" name="alergi_obat" class="form-control custom-select">
                                    <option name="alergi_obat" selected disabled>- Pilih -</option>
                                    <option name="alergi_obat" value="ya">Ya</option>
                                    <option name="alergi_obat" value="tidak">Tidak</option>
                                </select>
                                @if ($errors->has('kelurahan'))
                                <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Keluhan</label>
                                <input type="text" id="inputName" class="form-control" name="keluhan"
                                    value="{{ old('keluhan') }}">
                                @if ($errors->has('keluhan'))
                                <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Diagnosa</label>
                                <input type="text" id="inputName" class="form-control" name="diagnosa"
                                    value="{{ old('diagnosa') }}">
                                @if ($errors->has('diagnosa'))
                                <span class="text-danger">{{ $errors->first('diagnosa') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Tindakan</label>
                                <select id="inputStatus" name="tindakan" class="form-control custom-select">
                                    <option name="tindakan" selected disabled>- Pilih -</option>
                                    @foreach ($tindakan as $row)
                                    <option name="tindakan" value="{{ $row->id }}" {{'tindakan' == $row->id ? 'selected' : '' }}>{{ $row->jenis_tindakan }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tindakan'))
                                <span class="text-danger">{{ $errors->first('tindakan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Keterangan</label>
                                <input type="text" id="inputName" class="form-control" name="keterangan"
                                    value="{{ old('keterangan') }}">
                                @if ($errors->has('diagnosa'))
                                <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Resep Obat</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label for="inputName">Obat</label>
                        <select id="robat" name="robat" class="form-control custom-select">
                            <option name="robat" selected disabled>- Pilih -</option>
                            @foreach ($obats as $row)
                            <option name="robat" value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('robat'))
                        <span class="text-danger">{{ $errors->first('robat') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputName">Keterangan</label>
                        <input type="text" id="inputName" class="form-control" name="ket"
                            value="{{ old('ket') }}">
                        @if ($errors->has('diagnosa'))
                        <span class="text-danger">{{ $errors->first('ket') }}</span>
                        @endif
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
</section>
@endsection
@extends('layout.footer')
