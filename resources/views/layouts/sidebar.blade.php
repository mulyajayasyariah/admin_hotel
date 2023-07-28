<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        @if( Auth()->user()->id_hotel==1)
            <img src="{{ url('img/hss.png') }}" width="75" alt="">
        @elseif( Auth()->user()->id_hotel==3)
            <img src="{{ url('img/hws.png') }}" width="75" alt="">
        @else
            <img src="{{ url('img/logo-pt.png') }}" width="75" alt="">
        @endif
        <div class="sidebar-brand-text mx-3">{{ Auth()->user()->hotel->nama_hotel }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReservasi"
            aria-expanded="true" aria-controls="collapseReservasi">
            <i class="fa fa-fw fa-pen-alt"></i>
            <span>Reservasi</span>
        </a>
        <div id="collapseReservasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('reservasi') }}"><i class="fa fa-fw fa-calendar-times"></i>  Reservasi</a>
                <a class="collapse-item" href="{{ route('data_reservasi') }}"><i class="fa fa-fw fa-book-open"></i>  Data Reservasi</a> 
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-bed"></i>
            <span>Kamar</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                {{-- <a class="collapse-item" href="{{ route('reservasi') }}"><i class="fa fa-fw fa-calendar-times"></i>  Reservasi</a> --}}
                <a class="collapse-item" href="{{ route('checkin') }}"><i class="fa fa-fw fa-restroom"></i> Kamar</a> 
                <a class="collapse-item" href="{{ route('data_transaksi')}}"><i class="fa fa-fw fa-database"></i> Data Transaksi</a>
                <a class="collapse-item" href="{{ route('DataTambahan') }}"><i class="fa fa-fw fa-address-book"></i> Data Tambahan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengeluaran</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
                <a class="collapse-item" href="{{ route('pengeluaran') }}">Operasional</a>
                <a class="collapse-item" href="#">Token Listrik</a>
            </div>
        </div>
    </li>

    
    @if(Auth()->user()->id_role==1 || Auth()->user()->id_role==9)
    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Pemilik
        </div>
    
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOwner"
                aria-expanded="true" aria-controls="collapseOwner">
                <i class="fa fa-fw fa-book"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseOwner" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                    <a class="collapse-item" href="{{ route('laporan') }}"><i class="fa fa-fw fa-calculator"></i>Laporan</a>
                    <a class="collapse-item" href="#"><i class="fa fa-fw fa-bed"></i> Kamar</a> 
                    <a class="collapse-item" href="#"><i class="fa fa-fw fa-database"></i> Data Transaksi</a>
                    <a class="collapse-item" href="#"><i class="fa fa-fw fa-address-book"></i> Data Tambahan</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
    @endif
    


    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaturan Backend
    </div>
    
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Pengaturan Kamar</span>
        </a>
        <div id="collapseKamar" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('MetodeBayar') }}">Metode Bayar</a>
                <a class="collapse-item" href="{{ route('AturKamar') }}">Pengaturan Kamar</a>
                <a class="collapse-item" href="{{ route('Kategori_Kamar') }}">Kategori Kamar</a>
                <a class="collapse-item" href="{{ route('Harga_Kamar') }}">Kategori Harga</a>
                <a class="collapse-item" href="{{ route('Kategori_Transaksi') }}">Kategori Transaksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKeluar"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Pengaturan Keluar</span>
        </a>
        <div id="collapseKeluar" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Kategori_TransaksiKeluar') }}">Kategori Transaksi</a>
                <a class="collapse-item" href="{{ route('Kategori_Tambahan') }}">Kategori Tambahan</a>
                <a class="collapse-item" href="{{ route('Kategori_Pengeluaran') }}">Kategori Pengeluaran</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengaturan Akun</span>
        </a>
        <div id="collapseAkun" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('tampil') }}">Akun</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('charts.html') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('tables.html') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>