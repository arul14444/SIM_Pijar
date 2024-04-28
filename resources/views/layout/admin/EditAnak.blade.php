@extends('layout.admin.MasterAdmin')
@section('title','Edit Anak')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Manajemen Anak</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection
@section('content')
    <form id="editAnak" method="POST" action="/anak/edit/{{$data['detail']->uuid}}">
        @csrf
        @method('PUT')
        <div style="margin: 0 auto;">
            <div class="row mb-3">
                <div class="col-md-9">
                    <div class="form-floating">
                        <select class="form-select" id="inputNamaOrangTua" name="uuid_orang_tua" aria-label="Pilih Nama Orang Tua">
                            <option disabled>Pilih Nama Orang Tua</option>
                            @foreach ($data['listOrtu'] as $dt)
                                <option value="{{ $dt->uuid }}" @if ($data['detail']->nama == $dt->nama) selected @endif>{{ $dt->nama }}</option>
                            @endforeach
                        </select>
                        <label for="inputNamaOrangTua">Nama Orang Tua</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <select class="form-select" id="inputBpjs" name="bpjs">
                            <option value="ya" @if($data['detail']->bpjs == 'ya') selected @endif>Punya</option>
                            <option value="kis " @if($data['detail']->bpjs == 'kis') selected @endif>KIS</option>
                            <option value="tidak" @if($data['detail']->bpjs == 'tidak') selected @endif>Tidak</option>
                            
                        </select>
                        <label for="inputBpjs">Kepemilikan BPJS</label>
                    </div>                    
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputNamaLengkap" name="nama_lengkap" type="text" value="{{$data['detail']->nama_lengkap}}"/>
                <label for="inputNamaLengkap">Nama Lengkap</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputNamaPanggilan" name="nama_panggilan" type="text" value="{{$data['detail']->nama_panggilan}}" />
                        <label for="inputNamaPanggilan">Nama Panggilan</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputNomortelepon" name="nomor_telepon" type="text" value="0{{$data['detail']->nomor_telepon}}" />
                        <label for="inputNomorTelepon">Nomor Telepon</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputTempatLahir" name="tempat_lahir" type="text" value="{{$data['detail']->tempat_lahir}}" />
                        <label for="inputTempatLahir">Tempat Lahir</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input class="form-control" id="inputTanggalLahir" name="tgl_lahir" type="date" value="{{$data['detail']->tgl_lahir}}"/>
                        <label for="inputTanggalLahir">Tanggal Lahir</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="inputAbdKiri" name="uuid_abd_kiri" aria-label="Pilih Jenis ABD Telinga Kiri">
                            <option disabled>Pilih Jenis Abd</option>
                            @foreach ($data['listAbd'] as $jenis)    
                                <option value="{{ $jenis->uuid }}" @if($data['detail']->jenis_abd_kiri == $jenis->jenis) selected @endif>{{ $jenis->jenis }}</option>
                            @endforeach
                        </select>                        
                        <label for="inputAbdKiri">Jenis ABD Telinga Kiri</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="inputAbdKanan" name="uuid_abd_kanan" aria-label="Pilih Jenis ABD Telinga Kanan">
                            <option disabled selected>Pilih Jenis Abd</option>
                            @foreach ($data['listAbd'] as $jenis)    
                                <option value="{{ $jenis->uuid }}" @if($data['detail']->jenis_abd_kanan == $jenis->jenis) selected @endif>{{ $jenis->jenis }}</option>
                            @endforeach
                        </select>
                        
                        <label for="inputAbdKanan">Jenis ABD Telinga Kanan</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputGangguanTelingaKiri" name="kemampuan_telinga_kiri" type="text" value="{{$data['detail']->kemampuan_kiri}}" />
                        <label for="inputGangguanTelingaKiri">Kemampuan Dengar Telinga Kiri (Hz)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input class="form-control" id="inputGangguanTelingaKanan" name="kemampuan_telinga_kanan" type="text" value="{{$data['detail']->kemampuan_kanan}}" />
                        <label for="inputGangguanTelingaKanan">Kemampuan Dengar Telinga Kanan (Hz)</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input class="form-control" id="inputGangguanTelingaBinaural" name="kemampuan_telinga_binaural" type="text" value="{{$data['detail']->kemampuan_binaural}}" />
                        <label for="inputGangguanTelingaKanan">Kemampuan Dengar Binaural(Hz)</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPenyakitPenyerta" name="penyakit_penyerta" type="text" value="{{$data['detail']->penyakit_penyerta}}" />
                <label for="inputPenyakitPenyerta">Penyakit Penyerta</label>
            </div>
            <div class="mt-4 mb-0">
                <button type="submit" class="btn btn-primary btn-block" onclick="return confirmEdit({{$data['detail']->uuid}})">Simpan</button>
            </div>
        </div>
    </form>
    <script src="{{ asset('resources/js/anak.js') }}"></script>

@endsection