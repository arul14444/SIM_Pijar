@extends('layout.admin.MasterAdmin')
@section('title', 'Managemen Arsip')
@section('route')
    <li class="breadcrumb-item active"> Managemen Arsip </li>
@endsection

@section('content')
    
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Data Arsip</span>
        <form method="POST" action="/arsip/print-pdf" target="_blank">
            @csrf
            <button type="submit" class="btn btn-outline-dark">
                <i class="fa-solid  fa-download me-2"></i>Unduh
            </button>
        </form>
    </div>

    <div class="card-body">
        <table id="tabelArsip" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Dokumen</th>
                    <th>Deskripsi</th>
                    <th>Kode</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Dokumen</th>
                    <th>Deskripsi</th>
                    <th>Kode</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar Aset --}}
                @foreach ($data as $index => $dt )
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dt->nama_Dokumen }}</td>
                    <td>{{ $dt->deskripsi_Dokumen }}</td>
                    <td>{{ $dt->kode_Dokumen }}</td>
                    <td>{{ $dt->nama_foto_dokumen }}</td>
                    <td> 
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-primary" style="margin-right: 10px;" onclick="editRow(this)">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger" onclick="deleteRow(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>                   
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
            new simpleDatatables.DataTable('#tabelArsip');
        });
    </script>
@endpush
