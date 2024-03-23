@extends('layout.admin.MasterAdmin')
@section('title','Edit Surat')
@section('route')
        <li class="breadcrumb-item active">Edit Surat</li>

@endsection
@section('content')
<form method="POST" action="/surat/edit/{{$data['detail']->uuid}}">
        @csrf
        @method('PUT')
        <div style="margin: 0 auto;">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <input class="form-control" id="inputNoSurat" name="nomor_surat" type="text" value="{{$data['detail']->nomor_surat}}" />
                        <label for="inputNoSurat">Nomor Surat</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" id="inputPemberiTugas" name="uuid_jabatan_pemberi" aria-label="Pilih Pemberi Tugas">
                            @foreach ($data['pengurusInti'] as $dt)    
                                <option value="{{$dt->uuid}}" @if($dt->nama == $data['detail']->nama_pemberi && $dt->jabatan == $data['detail']->jabatan_pemberi) selected @endif>{{$dt->nama}} ({{$dt->jabatan}})</option>
                            @endforeach
                        </select>
                        <label for="inputNamaOrangTua">Yang bertanda tangan</label>
                    </div>
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="inputPenerimaTugas" name="uuid_penerima" aria-label="Pilih Penerima Tugas">
                            @foreach ($data['pengurus'] as $dt)    
                                <option value="{{$dt->uuid}}" @if($dt->nama == $data['detail']->nama_penerima) selected @endif>{{$dt->nama}}</option>
                            @endforeach
                        </select>
                        <label for="inputNamaOrangTua">Penerima Tugas</label>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputJabatan" name="jabatan_penerima" type="text" value="{{$data['detail']->jabatan_penerima}}" />
                        <label for="inputJabatan">Jabatan</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputKeperluan" name="keperluan" type="text" value="{{$data['detail']->keperluan}}" />
                <label for="inputKeperluan">Keperluan</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputTempatDibuat" name="tempat_dibuat" type="text" value="{{$data['detail']->tempat_dibuat}}" />
                        <label for="inputTempatDibuat">Tempat dibuat</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputTanggalDibuat" name="tgl_dibuat" type="date" value="{{$data['detail']->tgl_dibuat}}" />
                        <label for="inputTanggalDibuat">Tanggal dibuat</label>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-0">
                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Apakah Anda yakin menyimpan untuk data ini?')">Simpan</button></div>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/js/surat.js') }}"></script>

@endsection
