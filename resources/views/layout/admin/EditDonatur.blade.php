@extends('layout.admin.MasterAdmin')
@section('title','Edit Donatur')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Manajemen Donatur</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection
@section('content')    
    <form method="POST" action="/donatur/edit/{{$data['detail']->uuid}}">
        @csrf
        @method('PUT')
        <div style="margin: 0 auto; ">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNama" name="nama" type="text" value="{{$data['detail']->nama}}" />
                <label for="inputNama">Nama Lengkap</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="inputNomortelepon" name="nomor_telepon" type="text" value="0{{$data['detail']->nomor_telepon}}" />
                        <label for="inputNomorTelepon">Nomor Telepon</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='form-floating mb-3'>
                        <select class="form-select" id="inputInstansi" name="uuid_instansi" aria-label="Pilih Instansi">
                            <option selected disabled>Pilih Instansi</option>
                            @foreach ($data['instansi'] as $jenis)    
                            <option value="{{$jenis->uuid}}" @if($jenis->instansi == $data['detail']->instansi) selected @endif>{{$jenis->instansi}}</option>
                            @endforeach
                        </select>
                        <label for="inputInstansi">Jenis Instansi</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputAlamat" name="alamat" type="text" rows="3" value="{{$data['detail']->alamat}}" />
                <label for="inputAlamat">Alamat</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan perubahan data ini?')">Simpan</button></div>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/js/donatur.js') }}"></script>
@endsection