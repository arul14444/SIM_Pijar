@extends('layout.admin.MasterAdmin')
@section('title','Tambah Anggota')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen Anggota</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection
@section('content')
    <div class="text-center mb-4">
        <img src="{{ asset('asset/logo yayasan.png') }}" alt="Logo Yayasan Pijar" width=25% height=25%>
    </div>
    
    <form>
        <div style="margin: 0 auto; width: 50%">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNama" type="text" placeholder="Masukan nama lengkap" />
                <label for="inputNama">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNomorTelpon" type="text" placeholder="Masukan nomor telepon" />
                <label for="inputNomorTelepon">Nomor Telepon</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputUsername" type="text" placeholder="Masukan username" />
                <label for="inputUsername">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPassword" type="password" placeholder="Masukan passsword" />
                <label for="inputPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputKonfirmasiPassword" type="password" placeholder="Konfirmasi passwprd" />
                <label for="inputKonfirmasiPassword">Konfirmasi Password</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputAlamat" type="text" rows="3"placeholder="Masukan alamat lengkap" />
                <label for="inputAlamat">Alamat</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><a class="btn btn-primary btn-block" href="login.html">Register</a></div>
            </div>
        </div>
    </form>
@endsection