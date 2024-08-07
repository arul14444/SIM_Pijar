@extends('layout.admin.MasterAdmin')
@section('title', 'Manajemen Donatur')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Donatur </li>
@endsection

@section('content')
    <div class="row card-header d-flex justify-content-between align-items-center">
        <div class="col-md-8">
            <span>Data Donatur</span>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/tambah/donatur')}}" class="btn btn-outline-success" style="width: 110px; height: 35px;"> 
                        <i class="fa-solid fa-add me-2"></i> Tambah
                    </a>     
                </div>
                <div class="col-md-6 text-end">
                    <form method="POST" action="/donatur/print-pdf" target="_blank">
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
        <table id="tabelDonatur" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Instansi</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Instansi</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar anggota --}}
                @foreach($data as $index => $dt)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$dt->nama ?? '-'}}</td>
                        <td>{{$dt->nomor_telepon ?? '-'}}</td>
                        <td>{{$dt->instansi ?? '-'}}</td>
                        <td>{{$dt->alamat ?? '-'}}</td>
                        <td> 
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="/donatur/edit/{{$dt->uuid}}">                                    
                                    <button type="button"  data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary" data-placement="top" title="Edit"style="margin-right: 10px;">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <form method="POST" action="/donatur/delete/{{$dt->uuid}}">
                                    @csrf
                                    @method('PUT')
                                    <button id="hapusData" data-toggle="tooltip" data-placement="top" data-placement="top" title="Hapus" title="Hapus"type="button" class="btn btn-danger" onclick="confirmDelete('{{ $dt->uuid }}')">
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
    <script src="{{ asset('resources/js/donatur.js') }}"></script>
@endsection

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#tabelDonatur');
        });
        //tooltip
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });

    </script>
@endpush
