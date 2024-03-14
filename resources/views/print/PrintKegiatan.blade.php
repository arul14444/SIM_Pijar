<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }
    </style>
</head>
<body>
    @include('print.header')
    <div class="mx-auto text-center" style="font-size: 16px; text-decoration: underline;">
        <b>Data Anggota</b>
    </div>    
    <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr class="text-center">
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Sumber Dana</th>
                </tr>
            </thead>
            <tbody>
                {{-- Daftar Kegiatan --}}
                @foreach ($data as $index => $dt)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dt->nama_kegiatan }}</td>
                    <td>{{ $dt->deskripsi_kegiatan }}</td>
                    <td>{{ $dt->tgl_kegiatan }}</td>
                    <td>{{ $dt->lokasi }}</td>
                    <td>{{ $dt->sumber_dana }}</td>
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