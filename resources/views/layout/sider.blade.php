@section('sider')

<a href="{{ route('home.index') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{ Auth::user()->role }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::user()->pegawai->photo !=null)
                  <img src="{{ asset('img/pegawai/'.auth()->user()->pegawai->photo)}}" class="img-circle" alt="User Image">
                  @else
                  <img src="/dist/img/avatar5.png" class="img-circle" alt="User Image">
                  @endif
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ route('home.index') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @if (Auth::user()->role!="Dokter" && Auth::user()->role!="Manager")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                       Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if (Auth::user()->role=="Resepsionis")
                    <li class="nav-item">
                        <a href="{{route('pasien.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pasien</p>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role=="Admin")
                    <li class="nav-item">
                        <a href="{{route('pegawai.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tindakan.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tindakan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('wilayah.index')}} " class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Wilayah</p>
                        </a>
                    </li>
                    @endif
                    @if (Auth::user()->role=="Apoteker")
                    <li class="nav-item">
                        <a href="{{route ('obat.index')}} " class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Obat</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
            @if (Auth::user()->role=="Dokter")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hand-holding-medical"></i></i>
                    <p>
                        Pemeriksaan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('pemeriksaan.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pemeriksaan Pasien</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->role=="Apoteker")

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-capsules"></i></i>
                    <p>
                        Resep
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('resep.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Resep Obat Pasien</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->role=="Manager")

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-chart-bar"></i></i>
                    <p>
                        Laporan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laporan-index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
@endsection
