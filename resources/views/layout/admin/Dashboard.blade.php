@extends('layout.admin.MasterAdmin')
@section('title', 'Dashboard')
@section('route')
    <li class="breadcrumb-item active"> Dashboard</li>
@endsection
@section('content')
    <div class="row">
        {{-- Infobox Pengurus --}}
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{url('/manajemen/pengurus')}}" style='text-decoration: none; color: inherit;'>
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
            <a href="{{url('/manajemen/anggota')}}" style='text-decoration: none; color: inherit;'>
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
        {{-- Infobox anak --}}
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{url('/manajemen/anak')}}" style='text-decoration: none; color: inherit;'>
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
        <!-- infobox donatur -->
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{url('/manajemen/donatur')}}" style='text-decoration: none; color: inherit;'>
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
        {{-- Infobox Surat --}}
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{url('/manajemen/surat')}}" style='text-decoration: none; color: inherit;'>
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
         <!-- Infobox kegiatan -->
         <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{url('/manajemen/kegiatan')}}" style='text-decoration: none; color: inherit;'>
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
        <!-- Infobox Arsip -->
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{url('/manajemen/arsip')}}" style='text-decoration: none; color: inherit;'>
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
        <!-- Infobox aset -->
        <div class="col-xl-3 col-md-4 mb-4">
            <a href="{{url('/manajemen/aset')}}" style='text-decoration: none; color: inherit;'>
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
    </div>
    {{-- Grafik --}}
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center" style="height: 50px;">
                    <i class="fas fa-chart-bar me-1"></i>
                    <span class="me-auto">Grafik Kepemilikan ABD</span>
                </div>                
                <div class="card-body">
                    <canvas id="chartKepemilikan" data-punya="{{$data['dataAbd']['kepemilikan']}}" data-tidakPunya="{{$data['dataAbd']['tidak_punya']}}" width="100%" height="375"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header" style="height: 50px;">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <i class="fas fa-chart-bar me-1"></i>
                            Kemampuan Dengar Anak
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" id="inputAnak" name="uuid_anak">
                                <option selected disabled value="">Pilih Nama Anak</option>
                                @foreach ($data['dataAnak'] as $dt)    
                                    <option value="{{$dt->uuid}}">{{$dt->nama_lengkap}}</option>
                                @endforeach
                            </select>               
                        </div>
                    </div>                
                </div>
                <div class="card-body">
                    <canvas id="chartPendengaran" width="100%" height="330px"></canvas>
                </div>
                <div class="mr-auto p-2"> <span style="color: red;">*</span>Semakin menurun grafik, maka kemampuan pendengaran semakin membaik</div>
            </div>
        </div>
    </div>

    {{-- write code for table kegiantan --}}
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center" style="height: 50px;">
            <i class="fas fa-table me-1"></i>
            <span class="me-auto">Tabel Kegiatan</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Lokasi</th>
                                <th>Sumber Dana</th>
                                <th>Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($data['dataKegiatan']->take(5) as $index => $dt)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $dt->nama_kegiatan }}</td>
                                <td>{{ $dt->deskripsi_kegiatan }}</td>
                                <td>{{ $dt->tgl_kegiatan }}</td>
                                <td>{{ $dt->lokasi }}</td>
                                <td>{{ $dt->sumber }}</td>
                                <td> 
                                    <ul>
                                    @foreach($dt->path_foto_kegiatan as $path_foto)
                                        <li>
                                            <a href="{{(config('app.url').'/'.$path_foto)}}" target="_blank">{{ basename($path_foto) }}</a>
                                        </li>
                                    @endforeach
                                    <ul>
                                </td>
                            </tr>
                        @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>     

{{-- <div class="row">
    <div class="col-md-6">
         <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Aset
            </div>
            <div class="card-body">
                <canvas id="chartAset" data-tersedia="{{$data['dataAset']['tersedia']}}" data-tidakTersedia="{{$data['dataAset']['tidak_tersedia']}}" data-rusak="{{$data['dataAset']['rusak']}}" data-perbaikan="{{$data['dataAset']['dalam_perbaikan']}}" width="100%" height="350"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                Data Aset
                
                <a class="btn btn-outline-dark float-right" onclick="reset()">
                    <i class="fa-solid fa-arrows-rotate"></i>
                </a>
            </div>
            <div class="card-body" style="overflow-y: auto; max-height: 368px;">
                <table id="tabelAset" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Barang</th>
                            <th>Kode</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div> --}}

{{-- <div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Kegiatan
            </div>
            <div  class="card-body"><canvas id="chartKegiatan" width="100%" height="350"></canvas></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Grafik Sumber Dana Kegiatan
            </div>
            <div  class="card-body"><canvas id="chartSumberDana" width="100%" height="350"></canvas></div>
        </div>
    </div>
</div> --}}


<script>
    var sumberDana = @json($data['sumberDana']);
</script>
<script> 
    var labelKegiatan = @json($data['totalKegiatan']->pluck('bulan'));
    var dataKegiatan = @json($data['totalKegiatan']->pluck('total'));
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('resources/js/chartAbd.js') }}"></script>
<script src="{{ asset('resources/js/chartAset.js') }}"></script>
<script src="{{ asset('resources/js/chartDana.js') }}"></script>
<script src="{{ asset('resources/js/chartKegiatan.js') }}"></script>
<script src="{{ asset('resources/js/chartKemampuanDengar.js') }}"></script>
@endsection

