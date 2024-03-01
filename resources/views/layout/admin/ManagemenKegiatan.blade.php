@extends('layout.admin.MasterAdmin')
@section('title', 'Managemen Kegiatan')
@section('route')
    <li class="breadcrumb-item active"> Managemen </li>
@endsection

@section('content')
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Data Kegiatan</span>
        <button class="btn btn-outline-dark">
            <i class="fa-solid fa-print me-2"></i>Cetak 
        </button>
    </div>
    <div class="card-body">
        <table id="myTable" class="table">
            <thead>
                <tr class="text-center">
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Sumber Dana</th>
                    <th>Dokumentasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Sumber Dana</th>
                    <th>Dokumentasi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar Kegiatan --}}
                @foreach ($data as $dt )
                <tr>
                    <td> {{$dt->nama_kegiatan}}</td>
                    <td> {{$dt->deskripsi_kegiatan}}</td>
                    <td> {{$dt->lokasi}}</td>
                    <td> {{$dt->sumber_dana}}</td>
                    <td> {{$dt->nama_foto_kegiatan}}</td>
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
            new simpleDatatables.DataTable('#myTable');
        });
    </script>
@endpush
