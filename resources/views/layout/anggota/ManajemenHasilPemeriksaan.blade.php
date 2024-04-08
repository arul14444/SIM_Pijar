@extends('layout.anggota.MasterAnggota')
@section('title', 'Manajemen Hasil Pemeriksaan')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Hasil Pemeriksaan</li>
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
    <div class="card-body">
        <table id="tabelRiwayat" class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Tanggal</th>
                    <th>Telinga Kiri (hz)</th>
                    <th>Telinga Kanan (hz)</th>
                    <th>Binaural (hz)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    
</div>
<script src="{{ asset('resources/js/dataPemeriksaan.js') }}"></script>

@endsection