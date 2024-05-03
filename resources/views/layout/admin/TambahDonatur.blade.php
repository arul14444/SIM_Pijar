@extends('layout.admin.MasterAdmin')
@section('title','Tambah Donatur')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('manajemen/donatur')}}">Manajemen Donatur</a></li>
        <li class="breadcrumb-item active">Tambah Donatur</li>
    </ol>
@endsection
@section('content')
<form id="tambahDonatur" method="POST" action="/tambah/donatur">
    @csrf
    <div style="margin: 0 auto; ">
        <div class="form-floating mb-3">
            <input class="form-control" id="inputNama" name="nama" type="text" placeholder="Masukan nama lengkap" />
            <label for="inputNama">Nama Lengkap/Instansi</label>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputNomortelepon" name="nomor_telepon" type="text" placeholder="Masukan nomor telepon" />
                    <label for="inputNomorTelepon">Nomor Telepon</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class='form-floating mb-3'>
                    <select class="form-select" id="inputInstansi" name="uuid_instansi" aria-label="Pilih Instansi">
                        <option selected disabled>Pilih Instansi</option>
                        @foreach ($data['listInstansi'] as $jenis)    
                        <option value="{{$jenis->uuid}}">{{$jenis->instansi}}</option>
                        @endforeach
                    </select>
                    <label for="inputInstansi">Jenis Instansi</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputAlamat" name="alamat" type="text" rows="3" placeholder="Masukan alamat lengkap" />
            <label for="inputAlamat">Alamat</label>
        </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Tambah</button></div>
        </div>
    </div>
</form>
<script src="{{ asset('resources/js/donatur.js') }}"></script>
@endsection