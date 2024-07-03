@extends('layout.admin.MasterAdmin')
@section('title', 'Manajemen Arsip')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Arsip </li>
@endsection

@section('content')
    <div class="row card-header d-flex justify-content-between align-items-center">
        <div class="col-md-8">
            <span>Data Arsip</span>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/tambah/arsip')}}" class="btn btn-outline-success" style="width: 110px; height: 35px;"> 
                        <i class="fa-solid fa-add me-2"></i> Tambah
                    </a>     
                </div>
                <div class="col-md-6 text-end">
                    <form method="POST" action="/arsip/print-pdf" target="_blank">
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
        <table id="tabelArsip" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Dokumen</th>
                    <th>Deskripsi</th>
                    <th>Lampiran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Dokumen</th>
                    <th>Deskripsi</th>
                    <th>Lampiran</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar Aset --}}
                @foreach ($data as $index => $dt )
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dt->nama_dokumen }}</td>
                    <td>{{ $dt->deskripsi_dokumen }}</td>
                    <td> 
                        <ul>
                            @foreach($dt->path_file_dokumen as $path_file)
                            <li>
                                <a href="{{(config('app.url').'/'.$path_file)}}" target="_blank">{{ basename($path_file) }}</a>
                            </li>
                             @endforeach
                        </ul>
                    </td>
                    <td> 
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="/arsip/edit/{{$dt->uuid}}">
                                <button type="button" class="btn btn-primary" style="margin-right: 10px;" data-placement="top" title="Edit" onclick="editRow(this)">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </a>
                            <form method="POST" action="/arsip/delete/{{$dt->uuid}}">
                                @csrf
                                @method('PUT')
                                <button id="hapusData" type="button" class="btn btn-danger" data-placement="top" title="Hapus"onclick="confirmDelete('{{ $dt->uuid }}')">
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
    <script src="{{ asset('resources/js/arsip.js') }}"></script>
@endsection

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#tabelArsip');
        });
    </script>
@endpush
