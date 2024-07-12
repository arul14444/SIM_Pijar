@extends('layout.admin.MasterAdmin')
@section('title','Edit Pengurus')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/manajemen/pengurus')}}">Manajemen Pengurus Inti</a></li>
        <li class="breadcrumb-item active">Edit Pengurus Inti</li>
    </ol>
@endsection
@section('content')
    <form id="editPengurus" method="POST" action="/pengurus/edit/{{$data['detail']->uuid}}">
        @csrf
        @method('PUT')
        <div style="margin: 0 auto; ">
            <div class="form-floating mb-3">
                <select class="form-select" id="inputJabatan" name="uuid_jabatan">
                    @foreach($data['listJabatan'] as $jabatan)
                        <option value="{{$jabatan->uuid}}" {{$data['detail']->jabatan == $jabatan->jabatan ? 'selected' : ''}}>{{$jabatan->jabatan}}</option>
                    @endforeach
                </select>
                <label for="inputJabatan">Jabatan</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNama" name="nama" type="text" value="{{$data['detail']->nama}}"/>
                <label for="inputNama">Nama Lengkap</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNomortelepon" name="nomor_telepon" type="text" value="{{$data['detail']->nomor_telepon}}" />
                <label for="inputNomorTelepon">Nomor Telepon</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputAlamat" name="alamat" type="text" rows="3" value="{{$data['detail']->alamat}}" />
                <label for="inputAlamat">Alamat</label>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Simpan</button></div>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/js/anggota.js') }}"></script>
@endsection