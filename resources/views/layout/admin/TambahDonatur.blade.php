@extends('layout.admin.MasterAdmin')
@section('title','Tambah Donatur')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen Donatur</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection
@section('content')
<form id="tambahDonatur" method="POST" action="/tambah/donatur">
    @csrf
    <div style="margin: 0 auto; ">
        <div class="form-floating mb-3">
            <input class="form-control" id="inputNama" name="nama" type="text" placeholder="Masukan nama lengkap" />
            <label for="inputNama">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputNomortelepon" name="nomor_telepon" type="text" placeholder="Masukan nomor telepon" />
            <label for="inputNomorTelepon">Nomor Telepon</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputAlamat" name="alamat" type="text" rows="3" placeholder="Masukan alamat lengkap" />
            <label for="inputAlamat">Alamat</label>
        </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Tambah</button></div>
        </div>
    </div>
</form>
<script src="{{ asset('resources/donatur.js') }}"></script>
@endsection