<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" >
    <button class="btn ps-4 btn-link btn-sm order-1 order-lg-0 " id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <div class="col-3">
        <a class="navbar-brand ps-3  mb-0" href="" >
            <img src="{{ asset('asset/logo yayasan.png') }}" alt="Logo Yayasan Pijar" width="10%" height="10%" class="me-2 "> 
            SIM Pijar
            <!-- Sidebar Toggle-->
        </a> 
    </div>
    {{-- nav --}}
    <div class="d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
    </div>
    <!-- profil -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>