@extends('layout.admin.MasterAdmin')
@section('title', 'Manajemen Anak')
@section('route')
    <li class="breadcrumb-item active"> Manajemen Anak</li>
@endsection

@section('content')
    <div class="row card-header d-flex justify-content-between align-items-center">
        <div class="col-md-8">
            <span>Data Anak</span>
        </div>
        <div class="col-md-4 d-flex justify-content-end">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/tambah/anak')}}" class="btn btn-outline-success" style="width: 110px; height: 35px;"> 
                        <i class="fa-solid fa-add me-2"></i> Tambah
                    </a>     
                </div>
                <div class="col-md-6 text-end">
                    <form method="POST" action="/anak/print-pdf" target="_blank">
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
        <table id="tabelAnak" class="table">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Anak</th>
                    <th>Nomor Telepon</th>
                    <th>Nama Orangtua</th>
                    <th>ABD Kiri</th>
                    <th>ABD Kanan</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Anak</th>
                    <th>Nomor Telepon</th>
                    <th>Nama Orangtua</th>
                    <th>ABD Kiri</th>
                    <th>ABD Kanan</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                {{-- Daftar Anak --}}
                @foreach($data as $index => $dt)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dt->nama_lengkap }}</td>
                    <td>{{ $dt->nomor_telepon }}</td>
                    <td>{{ $dt->nama }}</td>
                    <td>{{ $dt->jenis_abd_kiri }}</td>
                    <td>{{ $dt->jenis_abd_kanan }}</td>
                    <td>{{ $dt->alamat }}</td>
                    <td>
                        @if($dt->flag_aktif == 1)
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </td>
                    <td> 
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('anak.edit', $dt->uuid) }}">
                                <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary" style="margin-right: 10px;">
                                    <i class="far fa-edit"></i> 
                                </button>
                            </a>                            
                            <form method="POST" action="/anak/delete/{{$dt->uuid}}">
                                @csrf
                                @method('PUT')
                                <button id="hapusData" data-toggle="tooltip" data-placement="top" title="Hapus" type="button" class="btn btn-danger" onclick="confirmDelete('{{ $dt->uuid }}')">
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
    <script src="{{ asset('resources/js/anak.js') }}"></script>
    @endsection
    
    @push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#tabelAnak');
        });
    </script>
@endpush
