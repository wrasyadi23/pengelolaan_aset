<div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
        {{-- <li class="nav-label">Dashboard</li> --}}
        <li>
            <a href="/pemeliharaan/dashboard" aria-expanded="false">
                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/pemeliharaan/pekerjaan" aria-expanded="false">
                <i class="icon-note menu-icon"></i><span class="nav-text">Input Pekerjaan</span>
            </a>
        </li>
        @if (Auth::user()->role == 'Admin')    
        <li>
            <a href="/pemeliharaan/klasifikasi" aria-expanded="false">
                <i class="icon-note menu-icon"></i><span class="nav-text">Input Klasifikasi Pekerjaan</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->role == 'Admin' && Auth::user()->role == 'Worker')    
        <li>
            <a href="/pemeliharaan/data" aria-expanded="false">
                <i class="icon-chart menu-icon"></i><span class="nav-text">Data Pemeliharaan</span>
            </a>
        </li>
        @endif
        {{-- <li>
            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="icon-graph menu-icon"></i><span class="nav-text">Suku Cadang</span>
            </a>
            <ul>
                <li><a href="/pemeliharaan/suku-cadang">Input Stok</a></li>
                <li><a href="/pemeliharaan/suku-cadang-info">Info Stock</a></li>
                <li><a href="/pemeliharaan/suku-cadang-laporan">Laporan</a></li>
            </ul>
        </li> --}}
        <li>
            <a href="/pemeliharaan/laporan" aria-expanded="false">
                <i class="icon-notebook menu-icon"></i><span class="nav-text">Laporan</span>
            </a>
        </li>
    </ul>
</div>