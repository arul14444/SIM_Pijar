<div id="layoutSidenav_nav" >
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link" href="{{ url('/dashboard/admin')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="{{ url('/manajemen/pengurus')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-sitemap"></i></div>
                    Pengurus Inti
                </a>
                <a class="nav-link collapsed" href="{{url('/manajemen/anggota')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Anggota
                </a>

                <a class="nav-link collapsed" href="{{url('manajemen/anak')}}" >
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-children"></i></div>
                    Anak
                </a>
                
                <a class="nav-link collapsed" href="{{url('manajemen/donatur')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-dollar-to-slot"></i></i></div>
                    Donatur
                </a>
                
                <a class="nav-link collapsed" href="{{url('manajemen/aset')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></i></div>
                    Aset
                </a>

                <a class="nav-link collapsed" href="{{url('manajemen/kegiatan')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                    Kegiatan
                </a>                
                <a class="nav-link collapsed" href="{{url('manajemen/arsip')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Arsip
                </a>
                <a class="nav-link collapsed" href="{{url('manajemen/surat')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-envelope"></i></div>
                    Surat
                </a>
           </div>
        </div>
    </nav>
</div>
