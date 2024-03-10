<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('print.header')
    <div class="mx-auto text-center" style="font-size: 16px; text-decoration: underline;">
        <b>Data Anak</b>
    </div>    
    <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor telepon</th>
                    <th>Alamat</th>
                    <th>Kemampuan dengar kiri</th>
                    <th>Kemampuan dengar kanan</th>
                    <th>Kemampuan dengar binaural</th>
                </tr>
            </thead>
            <tbody>
                {{-- Daftar Anggota --}}
                @php
                    $nomor = 1; // Inisialisasi nomor urut
                @endphp
                @foreach($data as $dt)
                <tr>
                    <td class="text-center">{{ $nomor++ }}</td> <!-- Menambahkan nomor urut dan mengatur teks menjadi rata tengah -->
                    <td>{{ $dt->nama_lengkap }}</td>
                    <td>0{{ $dt->nomor_telepon }}</td>
                    <td>{{ $dt->alamat }}</td>
                    <td>{{ $dt->kemampuan_kiri}}</td>
                    <td>{{ $dt->kemampuan_kanan}}</td>
                    <td>{{ $dt->kemampuan_binaural}}</td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src= {{ asset("template/js/scripts.js")}}></script>
</body>
</html>