@extends('layout.anggota.MasterAnggota')
@section('title', 'Manajemen Hasil Pemeriksaan')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Hasil Pemeriksaan</li>
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
<div class="row card-header d-flex justify-content-between align-items-center">
        <div class="col-md-8">
            <span>Data Anak</span>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/tambah/hasil-pemeriksaan')}}" class="btn btn-outline-success" style="width: 110px; height: 35px;"> 
                        <i class="fa-solid fa-add me-2"></i> Tambah
                    </a>     
                </div>
                {{-- <div class="col-md-6 text-end">
                    <form method="POST" action="/hasil/pemeriksaan/print-pdf" target="_blank">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark" style="width: 110px; height: 35px;">
                            <i class="fa-solid fa-download me-2"></i> Unduh
                        </button>
                    </form>
                </div> --}}
            </div>            
        </div>
</div> 
<div class="card-body">
    <table id="tabelRiwayat" class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th>Tanggal Periksa</th>
                <th>Telinga Kiri (dB)</th>
                <th>Telinga Kanan (dB)</th>
                <th>Binaural (dB)</th>
                <th>Lampiran </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
    
{{-- <script>
    appUrl = "{{ config('app.url') }}";
</script> --}}
<script src="{{ asset('resources/js/dataPemeriksaan.js') }}"></script>
@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
@endpush

@endsection