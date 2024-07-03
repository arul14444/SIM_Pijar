@extends('layout.admin.MasterAdmin')
@section('title','Tambah Data Pengurus Inti ')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/manajemen/pengurus')}}">Manajemen Pengurus Inti</a></li>
        <li class="breadcrumb-item active">Tambah Data Pengurus Inti</li>
    </ol>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Data Pengurus Inti
        </div>
        <div class="card-body">
            <form id="editPengurus" method="POST" action="/tambah/pengurus">
                @csrf
                @method('POST')
                <div style="margin: 0 auto; ">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="inputJabatan" name="jabatan">
                            <option value="">Pilih Jabatan</option>
                            @foreach($data['listJabatan'] as $jabatan)
                                <option value="{{$jabatan->uuid}}">{{$jabatan->jabatan}}</option>
                            @endforeach
                        </select>
                        <label for="inputJabatan">Jabatan</label>
                    </div>            
                    <div class="form-floating mb-3">
                        <select class="form-select" id="inputNama" name="nama">
                            <option value="">Pilih Nama</option>
                            @foreach($data['listAnggota'] as $anggota)
                                <option value="{{$anggota->uuid}}">{{$anggota->nama}}</option>
                            @endforeach
                        </select>
                        <label for="inputNama">Nama Lengkap</label>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Simpan</button></div>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Tambah Jabatan
        </div>
        <div class="card-body">
            <form id="tambahJabatan" method="POST" action="/tambah/jabatan">
                @csrf
                @method('POST')
                <div style="margin: 0 auto; ">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputJabatanBaru" name="jabatan_baru" type="text" placeholder="Enter your first name" />
                <label for="inputJabatanBaru">Jabatan Baru</label>
                    </div>            
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Simpan</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('resources/js/pengurus.js') }}"></script>
@endsection