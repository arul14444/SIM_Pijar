@extends('layout.anggota.MasterAnggota')
@section('title', 'Kegiatan Anggota')
@section('route')
    <li class="breadcrumb-item active">Kegiatan Anggota</li>
@endsection

@section('content')
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Data Kegiatan</span>
        <form method="POST" action="/kegiatan/print-pdf" target="_blank">
            @csrf
            <button type="submit" class="btn btn-outline-dark">
                <i class="fa-solid  fa-download me-2"></i>Unduh
            </button>
        </form>
    </div>
    <div class="card-body">
        <table id="tabelKegiatan" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Sumber Dana</th>
                    <th>Dokumentasi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Sumber Dana</th>
                    <th>Dokumentasi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar Kegiatan --}}
                @foreach ($data as $index => $dt)
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
@endsection

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#tabelKegiatan');
        });
    </script>
@endpush
