<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }
    </style>
</head>
<body>
    <div class="row text-center">
        <div class="col-md-5"  style="font-size: 12pt; text-decoration: underline;">
            <b>SURAT TUGAS</b> 
        </div> 
    </div>
    <div class="row text-center">
        <div class="col-md-5"  style="font-size: 12pt;">
            {{$data->nomor_surat}}
        </div> 
    </div>
    <div style="padding-top: 20px; padding-bottom: 20px;">
        Yang bertanda tangan dibawah ini:
        <div style="padding-top: 20px; padding-bottom: 20px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 100px;"> Nama </td>
                    <td style="width: 10px;"> : </td>
                    <td style="width: 600px;"> {{$data->pemberi}}</td>
                </tr>
                <tr>
                    <td> Jabatan </td>
                    <td> : </td>
                    <td> {{$data->jabatan_pemberi}} PiJAR Mutiara Bangsa </td>
                </tr>
                <tr>
                    <td style="vertical-align: top;"> Alamat </td>
                    <td style="vertical-align: top;"> : </td>
                    <td style="width: 600px;"> {{$data->alamat_pemberi}} </td>
                </tr>
            </table>
        </div>
        Dengan ini menugaskan kepada: 
    </div>
    <div style="padding-top: 20px; padding-bottom: 20px;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 100px;"> Nama </td>
                <td style="width: 10px;"> : </td>
                <td style="width: 600px;"> {{$data->penerima}} </td>
            </tr>
            <tr>
                <td> Jabatan </td>
                <td> : </td>
                <td> {{$data->jabatan_penerima}} PiJAR Mutiara Bangsa </td>
            </tr>
            <tr>
                <td style="vertical-align: top;"> Alamat </td>
                <td style="vertical-align: top;"> : </td>
                <td style="width: 600px;"> {{$data->alamat_penerima}} </td>
            </tr>
        </table>
    </div>    
    <div style="width: 700px; padding-bottom:20px">
        {{$data->keperluan}}
    </div>
    <div style="padding-bottom: 80px">
        Demikian Surat Tugas ini dibuat untuk dapat digunakan sebagaimana mestinya. 
    </div> 
    <div style="padding-bottom: 60px">
        <table>
            <tr>
                <td style="width: 430px"></td>
                <td style="width: 350px; text-align: center;">{{$data->tempat_dibuat}}, {{$data->tgl_dibuat}}</td>
            </tr>
            <tr>
                <br>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">{{$data->jabatan_pemberi}} </td>
            </tr>
            {{-- <tr>
                <td></td>
                <td style="text-align: center;"> PiJAR Mutiara Bangsa </td>
            </tr> --}}
        </table>
    </div>
    <div>
        <table>
            <tr>
                <td style="width: 430px"></td>
                <td style="width: 350px; text-align: center;">{{$data->pemberi}}</td>
            </tr>
        </table>
    </div>
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>