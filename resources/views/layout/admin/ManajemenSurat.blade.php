@extends('layout.admin.MasterAdmin')
@section('title', 'Manajemen Surat Tugas')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Surat Tugas</li>
@endsection

@section('content')
    <div class="row card-header d-flex justify-content-between align-items-center">
        <div class="col-md-8">
            <span>Data Surat Tugas</span>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <a href="{{ url('/tambah/surat')}}" class="btn btn-outline-success" style="width: 110px; height: 35px;"> 
                <i class="fa-solid fa-add me-2"></i> Tambah
            </a> 
        </div>
    </div>
    <div class="card-body">
        <table id="tabelSurat" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Yang Menugaskan</th>
                    <th>Yang Ditugaskan</th>
                    <th>Keperluan</th>
                    <th>Tempat, Tanggal dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Yang Menugaskan</th>
                    <th>Yang Ditugaskan</th>
                    <th>Keperluan</th>
                    <th>Tempat, Tanggal dibuat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar anggota --}}
                @foreach($data as $index => $dt)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$dt->nomor_surat}}</td>
                        <td>{{$dt->pemberi}} ({{$dt->jabatan_pemberi}})</td>
                        <td>{{$dt->penerima}} ({{$dt->jabatan_penerima}})</td>
                        <td>{{$dt->keperluan}}</td>
                        <td>{{$dt->tempat_dibuat}}, {{$dt->tgl_dibuat}}</td>
                        <td> 
                            <div class="d-flex justify-content-center align-items-center">
                                <form method="POST" action="/surat/print-pdf/{{$dt->uuid}}" target="_blank">
                                    @csrf
                                    <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Unduh" style="margin-right: 10px">
                                        <i class="fa-solid  fa-download"></i>
                                    </button>
                                </form>
                                <a href="/surat/edit/{{$dt->uuid}}">
                                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit" style="margin-right: 10px;" onclick="editRow(this)">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <form method="POST" action="/surat/delete/{{$dt->uuid}}">
                                    @csrf
                                    @method('PUT')
                                    <button id="hapusData" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="confirmDelete('{{ $dt->uuid }}')">
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
    <script src="{{ asset('resources/js/surat.js') }}"></script>
@endsection

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#tabelSurat');
        });
    </script>
@endpush
