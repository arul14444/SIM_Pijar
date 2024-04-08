<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Anggota</div>
                <a class="nav-link" href="/dashboard/anggota">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="{{ url('/manajemen/hasil-pemeriksaan')}}" >
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Hasil Pemeriksaan
                </a>
                <a class="nav-link" href="{{ url('/kegiatan/anggota')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                    Kegiatan
                </a>
            </div>
        </div>
    </nav>
</div>
