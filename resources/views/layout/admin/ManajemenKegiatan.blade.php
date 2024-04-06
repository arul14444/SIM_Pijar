@extends('layout.admin.MasterAdmin')
@section('title', 'Manajemen Kegiatan')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Kegiatan</li>
@endsection

@section('content')
    <div class="row card-header d-flex justify-content-between align-items-center">
        <div class="col-md-8">
            <span>Data Kegiatan</span>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/tambah/kegiatan')}}" class="btn btn-outline-success" style="width: 110px; height: 35px;"> 
                        <i class="fa-solid fa-add me-2"></i> Tambah
                    </a>     
                </div>
                <div class="col-md-6 text-end">
                    <form method="POST" action="/kegiatan/print-pdf" target="_blank">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark" style="width: 110px; height: 35px;">
                            <i class="fa-solid fa-download me-2"></i> Unduh
                        </button>
                    </form>
                </div>
            </div>            
        </div>
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
                    <th>Aksi</th>
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
                    <th>Aksi</th>
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
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                           <a href="/kegiatan/edit/{{$dt->uuid}}">
                                <button type="button" class="btn btn-primary" style="margin-right: 10px;" onclick="editRow(this)">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </a>
                            <form method="POST" action="/kegiatan/delete/{{$dt->uuid}}">
                                @csrf
                                @method('PUT')
                                <button id="hapusData" data-name="{{$dt->nama_kegiatan}}" type="button" class="btn btn-danger" onclick="confirmDelete('{{ $dt->uuid }}')">
                                    <i class="fas fa-trash"></i>
                                </button>                                                                 
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <script src="{{ asset('resources/js/kegiatan.js') }}"></script>
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
