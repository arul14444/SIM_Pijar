@extends('layout.admin.MasterAdmin')
@section('title', 'Dashboard')
@section('route')
    <li class="breadcrumb-item active"> Dashboard</li>
@endsection
@section('content')
<div class="row">
    {{-- Infobox Pengurus --}}
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/pengurus')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-warning shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">
                                Pengurus Inti</div>
                            <div class="text-xs mb-1">{{$data['pengurus']}} orang</div>
                        </div>
                        <div class="col-auto"> 
                            <i class="fa-solid fa-sitemap fa-2x"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Infobox anggota -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/anggota')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-success shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">Anggota</div>
                            <div class="text-xs mb-1"> {{$data['anggota']}} Orang</div>                            </div>
                        <div class="col-auto">
                           <i class="fa-solid fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
            
    <!-- infobox donatur -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/donatur')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-success shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">
                                Donatur</div>
                            <div class="text-xs mb-1">{{$data['donatur']}} Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-circle-dollar-to-slot fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <!-- Infobox aset -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/aset')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-info shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">Aset
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="text-xs mb-1">{{$data['aset']}} Barang</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-boxes-stacked fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Infobox Arsip -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/arsip')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-warning shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">
                                Arsip</div>
                            <div class="text-xs mb-1">{{$data['arsip']}} Dokumen</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Infobox kegiatan -->
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/kegiatan')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-warning shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">
                                Kegiatan</div>
                            <div class="text-xs mb-1">{{$data['kegiatan']}} Kegiatan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-list-check fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    {{-- Infobox anak --}}
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/anak')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-warning shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">
                                Anak</div>
                            <div class="text-xs mb-1">{{$data['anak']}} orang</div>
                        </div>
                        <div class="col-auto"> 
                            <i class="fa-solid fa-children fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    {{-- Infobox Surat --}}
    <div class="col-xl-3 col-md-4 mb-4">
        <a href="{{url('/managemen/surat')}}" style='text-decoration: none; color: inherit;'>
            <div class="card border-left-warning shadow h-100 py-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-3">
                            <div class="h5 mb-0 text-uppercase">
                                Surat</div>
                            <div class="text-xs mb-1">{{$data['surat']}} Surat</div>
                        </div>
                        <div class="col-auto"> 
                            <i class="fa-solid fa-envelope fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
{{-- Dashboard --}}
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Kepemilikan ABD
            </div>
            <div class="card-body">
                <canvas id="chartKepemilikan" data-punya="{{$data['dataAbd']['kepemilikan']}}" data-tidakPunya="{{$data['dataAbd']['tidak_punya']}}" width="100%" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Kepemilikan ABD
            </div>
            <div class="card-body">
                <canvas id="chartKepemilikan" data-punya="{{$data['dataAbd']['kepemilikan']}}" data-tidakPunya="{{$data['dataAbd']['tidak_punya']}}" width="100%" height="300"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Kegiatan
            </div>
            <div  class="card-body"><canvas id="chartKegiatan" width="100%" height="300"></canvas></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Sumber Dana Kegiatan
            </div>
            <div  class="card-body"><canvas id="chartSumberDana" width="100%" height="300"></canvas></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
         <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Aset
            </div>
            <div class="card-body">
                <canvas id="chartAset" data-tersedia="{{$data['dataAset']['tersedia']}}" data-tidakTersedia="{{$data['dataAset']['tidak_tersedia']}}" data-rusak="{{$data['dataAset']['rusak']}}" data-perbaikan="{{$data['dataAset']['dalam_perbaikan']}}" width="100%" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Data Aset
            </div>
            <div  class="card-body">
                
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('resources/js/dashboard.js') }}"></script>
<script src="{{ asset('resources/js/chartAbd.js') }}"></script>
<script src="{{ asset('resources/js/chartAset.js') }}"></script>
<script src="{{ asset('resources/js/chartDana.js') }}"></script>
<script src="{{ asset('resources/js/chartKegiatan.js') }}"></script>
@endsection