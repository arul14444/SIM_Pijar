<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Anggota</div>
                <a class="nav-link" href="/dashboard/anggota">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHasil" aria-expanded="false" aria-controls="collapseAnggota">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Hasil Pemeriksaan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseHasil" aria-labelledby="headingHasil" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/manajemen/hasil-pemeriksaan')}}">Data</a>
                    </nav>
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/tambah/hasil-pemeriksaan')}}">Tambah</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{ url('/kegiatan/anggota')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                    Kegiatan
                </a>
            </div>
        </div>
    </nav>
</div>
