@extends('layout.admin.MasterAdmin')
@section('title','Edit Aset')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Manajemen</a></li>
        <li class="breadcrumb-item active">Edit Aset</li>
    </ol>
@endsection
@section('content')
    <form method="POST" action="/aset/edit/{{$data['detail']->uuid}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" id="inputNamaBarang" name="nama_barang" type="text" value="{{$data['detail']->nama_barang}}" />
            <label for="inputNamaBarang">Nama Barang</label>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="inputKode" name="kode" type="text" value="{{$data['detail']->kode_barang}}" />
                    <label for="inputKode">Kode</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <select class="form-select" id="inputStatusAset" name="uuid_status_aset" aria-label="Pilih Status Aset">
                        @foreach ($data['status'] as $status)    
                            <option value="{{$status->uuid}}" @if($status->status == $data['detail']->status) selected @endif>{{$status->status}}</option>
                        @endforeach
                    </select>
                    <label for="inputStatusAset">Status Aset</label>
                </div>
            </div>        
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputDeskripsi" name="deskripsi" type="text" value="{{$data['detail']->deskripsi_barang}}" />
            <label for="inputDeskripsi">Deskripsi</label>
        </div>
        <div>
            <label for="formFileMultiple" class="form-label">Lampiran<span style="color: red;">*</span></label>
            <input class="form-control" type="file" id="formFileMultiple" name="lampiran[]" multiple>
        </div>
        
        <div class="mt-4 mb-0">
            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan perubahan data ini?')">Simpan</button></div>
        </div>
    </form>

    <div class="d-flex align-items-center justify-content-end mt-3" style="font-size: 14px;">
        <div class="mr-auto"> <span style="color: red;">*</span>File berjenis gambar (jpeg, png, jpg, gif) ukuran maksimal 4096kb</div>
    </div>
    <script src="{{ asset('resources/js/aset.js') }}"></script>
@endsection