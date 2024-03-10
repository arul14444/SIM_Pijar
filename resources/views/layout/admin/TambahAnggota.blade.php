@extends('layout.admin.MasterAdmin')
@section('title','Tambah Anggota')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen Anggota</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection
@section('content')
    <form id="tambahAnggota" method="POST" action="/tambah/anggota">
        @csrf
        <div style="margin: 0 auto; ">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNama" name="nama" type="text" placeholder="Masukan nama lengkap" />
                <label for="inputNama">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNomorTelpon" name="nomor_telepon" type="text" placeholder="Masukan nomor telepon" />
                <label for="inputNomorTelepon">Nomor Telepon</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputUsername" name="username" type="text" placeholder="Masukan username" />
                <label for="inputUsername">Username</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Enter your first name" />
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputKonfirmasiPassword" name="konfirmasi_password" type="password" placeholder="Enter your last name" />
                        <label for="inputKonfirmasiPassword">Konfirmasi Password</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputAlamat" name="alamat" type="text" rows="3" placeholder="Masukan alamat lengkap" />
                <label for="inputAlamat">Alamat</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Register</button></div>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/anggota.js') }}"></script>
@endsection