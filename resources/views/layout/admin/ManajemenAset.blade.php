@extends('layout.admin.MasterAdmin')
@section('title', 'Manajemen Aset')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Aset</li>
@endsection

@section('content')
    <div class="row card-header d-flex justify-content-between align-items-center">
        <div class="col-md-8">
            <span>Data Aset</span>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/tambah/aset')}}" class="btn btn-outline-success" style="width: 110px; height: 35px;"> 
                        <i class="fa-solid fa-add me-2"></i> Tambah
                    </a>     
                </div>
                <div class="col-md-6 text-end">
                    <form method="POST" action="/aset/print-pdf" target="_blank">
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
        <table id="tabelAset" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Barang</th>
                    <th>Deskripsi</th>
                    <th>Kode</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Deskripsi</th>
                    <th>Kode</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($data as $index => $dt)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dt->nama_barang }}</td>
                    <td>{{ $dt->deskripsi_barang }}</td>
                    <td>{{ $dt->kode_barang }}</td>
                    <td>{{ $dt->status }}</td>
                    <td>
                        <ul>
                            @foreach($dt->path_foto_barang as $path_foto)
                            <li>
                                <a href="{{(config('app.url').'/'.$path_foto)}}" target="_blank">{{ basename($path_foto) }}</a>
                            </li>
                            @endforeach
                        </ul>
                        
                    </td>
                    <td> 
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="/aset/edit/{{$dt->uuid}}">
                                <button type="button" class="btn btn-primary" data-placement="top" title="Edit" style="margin-right: 10px;" onclick="editRow(this)">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </a>
                            <form method="POST" action="/aset/delete/{{$dt->uuid}}">
                                @csrf
                                @method('PUT')
                                <button id="hapusData" type="button" data-placement="top" title="Hapus" class="btn btn-danger" onclick="confirmDelete('{{ $dt->uuid }}')">
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
    <script src="{{ asset('resources/js/aset.js') }}"></script>
@endsection

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#tabelAset');
        });
    </script>
@endpush
