@extends('layout.admin.MasterAdmin')
@section('title', 'Dashboard')
@section('route')
    <li class="breadcrumb-item active"> Dashboard</li>
@endsection
@section('content')
<div class="row">
    <!-- Infobox anggota -->
    <div class="col-xl-3 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-3">
                        <div class="h5 mb-0 text-uppercase">
                            Anggota</div>
                        <div class="text-xs mb-1"> {{$data['anggota']}} Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- infobox donatur -->
    <div class="col-xl-3 col-md-4 mb-4">
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
    </div>
    
    <!-- Infobox aset -->
    <div class="col-xl-3 col-md-4 mb-4">
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
    </div>

    <!-- Infobox Arsip -->
    <div class="col-xl-3 col-md-4 mb-4">
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
    </div>
    <!-- Infobox kegiatan -->
    <div class="col-xl-3 col-md-4 mb-4">
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
    </div>
    {{-- Infobox anak --}}
    <div class="col-xl-3 col-md-4 mb-4">
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
        </div>
    </div>
</div>







@endsection