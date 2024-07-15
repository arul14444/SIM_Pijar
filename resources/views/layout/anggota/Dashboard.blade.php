@extends('layout.anggota.MasterAnggota')
@section('title', 'Dashboard')
@section('route')
    <li class="breadcrumb-item active"> Dashboard</li>
@endsection
@section('content')
    <div class="mb-3">
        @if (count($data) == 0)
            <select class="form-select" id="inputAnak" name="uuid_anak" disabled>
            <option value="null">Tidak memiliki data anak</option>
            </select>
        @else
            <select class="form-select" id="inputAnak" name="uuid_anak">
            @foreach ($data as $dt)    
                <option value="{{$dt->uuid}}">{{$dt->nama_lengkap}}</option>
            @endforeach
            </select>
        @endif              
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
        <div class="mr-auto p-2" style="font-size: smaller; text-align: right;"> <span style="color: red;">*</span>Semakin menurun grafik, maka kemampuan pendengaran semakin membaik</div>
        <div class="card-body">
            <table id="tabelRiwayat" class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Telinga Kiri (dB)</th>
                        <th>Telinga Kanan (dB)</th>
                        <th>Binaural (dB)</th>
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

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
@endpush