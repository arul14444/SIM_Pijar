@extends('layout.anggota.MasterAnggota')
@section('title', 'Dashboard')
@section('route')
    <li class="breadcrumb-item active"> Dashboard</li>
@endsection
@section('content')
    <div class="mb-3">
        <select class="form-select" id="inputAnak" name="uuid_anak">
            @foreach ($data as $dt)    
                <option value="{{$dt->uuid}}">{{$dt->nama_lengkap}}</option>
            @endforeach
        </select>               
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <i class="fas fa-chart-bar me-1"></i>
                Riwayat Kemampuan Dengar Anak
            </div>             
        </div>
        <div class="card-body">
            <canvas id="chartPendengaran" width="100%" height="330px"></canvas>
        </div>
        
        <div class="card-body">
            <table id="tabelRiwayat" class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Telinga Kiri ((dB))</th>
                        <th>Telinga Kanan ((dB))</th>
                        <th>Binaural ((dB))</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('resources/js/chartKemampuanDengarAnak.js') }}"></script>
@endsection