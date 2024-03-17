<div id="layoutSidenav_nav" >
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link" href="{{ url('/dashboard/admin')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePengurus" aria-expanded="false" aria-controls="collapseAnggota">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-sitemap"></i></div>
                    Pengurus
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePengurus" aria-labelledby="headingPengurus" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/pengurus')}}">Data</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAnggota" aria-expanded="false" aria-controls="collapseAnggota">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Anggota
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAnggota" aria-labelledby="headingAnggota" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/anggota')}}">Data</a>
                        <a class="nav-link" href="{{ url('/tambah/anggota')}}">Tambah</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAnak" aria-expanded="false" aria-controls="collapseAnggota">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-children"></i></div>
                    Anak
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAnak" aria-labelledby="headingAnggota" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/anak')}}">Data</a>
                        <a class="nav-link" href="{{ url('/tambah/anak')}}">Tambah</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDonatur" aria-expanded="false" aria-controls="collapseDonatur">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-dollar-to-slot"></i></i></div>
                    Donatur
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDonatur" aria-labelledby="headingDonatur" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/donatur')}}">Data</a>
                        <a class="nav-link" href="{{ url('/tambah/donatur')}}">Tambah</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAset" aria-expanded="false" aria-controls="collapseAset">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></i></div>
                    Aset
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAset" aria-labelledby="headingAset" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/aset')}}">Data</a>
                        <a class="nav-link" href="{{ url('/tambah/aset')}}">Tambah</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseKegiatan" aria-expanded="false" aria-controls="collapseKegiatan">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                    Kegiatan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseKegiatan" aria-labelledby="headingKegiatan" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/kegiatan')}}">Data</a>
                        <a class="nav-link" href="{{ url('/tambah/kegiatan')}}">Tambah</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArsip" aria-expanded="false" aria-controls="collapseArsip">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Arsip
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseArsip" aria-labelledby="headingArsip" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/arsip')}}">Data</a>
                        <a class="nav-link" href="{{ url('/tambah/arsip')}}">Tambah</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSurat" aria-expanded="false" aria-controls="collapseSurat">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-envelope"></i></div>
                    Surat
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSurat" aria-labelledby="headingSurat" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/managemen/surat')}}">Data</a>
                        <a class="nav-link" href="{{ url('/tambah/surat')}}">Tambah</a>
                    </nav>
                </div>
                
            </div>
        </div>
    </nav>
</div>
