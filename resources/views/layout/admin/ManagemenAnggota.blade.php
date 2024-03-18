@extends('layout.admin.MasterAdmin')
@section('title', 'Managemen Anggota')
@section('route')
    <li class="breadcrumb-item active"> Managemen Anggota</li>
@endsection

@section('content')
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Data Anggota</span>
        <form method="POST" action="/anggota/print-pdf" target="_blank">
            @csrf
            <button type="submit" class="btn btn-outline-dark">
                <i class="fa-solid fa-download me-2"></i>Unduh
            </button>
        </form>
    </div>

    <div class="card-body">
        <table id="tabelAnggota" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar Anggota --}}
                @foreach($data as $index => $dt)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>0{{$dt->nomor_telepon}}</td>
                        <td>{{$dt->alamat}}</td>
                        <td> 
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary" style="margin-right: 10px;" onclick="editRow(this)">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <form method="POST" action="/anggota/delete/{{$dt->uuid}}">
                                    @csrf
                                    @method('PUT')
                                    <button id="hapusData" data-name="{{$dt->nama}}" type="button" class="btn btn-danger" onclick="confirmDelete('{{ $dt->uuid }}')">
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
    <script src="{{ asset('resources/js/anggota.js') }}"></script>
@endsection

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#tabelAnggota');
        });
    </script>
@endpush
