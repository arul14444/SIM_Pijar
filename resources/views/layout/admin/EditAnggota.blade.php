@extends('layout.admin.MasterAdmin')
@section('title','Edit Anggota')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Manajemen Anggota</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection
@section('content')
    <form id="editAnggota" method="POST" action="/anggota/edit/{{$data->uuid}}">
        @csrf
        @method('PUT')
        <div style="margin: 0 auto; ">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNama" name="nama" type="text" value="{{$data->nama}}" />
                <label for="inputNama">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNomortelepon" name="nomor_telepon" type="text" value="{{$data->nomor_telepon}}" />
                <label for="inputNomorTelepon">Nomor Telepon</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputAlamat" name="alamat" type="text" rows="3" value="{{$data->alamat}}" />
                <label for="inputAlamat">Alamat</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan perubahan data ini?')">Simpan</button></div>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/js/anggota.js') }}"></script>
@endsection