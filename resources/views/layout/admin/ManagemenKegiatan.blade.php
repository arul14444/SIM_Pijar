@extends('layout.admin.MasterAdmin')
@section('title', 'Managemen Kegiatan')
@section('route')
    <li class="breadcrumb-item active"> Managemen </li>
@endsection

@section('content')
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Data Kegiatan</span>
        <button class="btn btn-outline-dark">
            <i class="fa-solid fa-print me-2"></i>Cetak 
        </button>
    </div>

    <div class="card-body">
        <table id="myTable" class="table">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td> test</td>
                    <td> test</td>
                    <td> test</td>
                    <td> test</td>
                    <td> test</td>
                    <td> 
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-outline-primary" style="margin-right: 10px;" onclick="editRow(this)">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>                    
                    </td>
                </tr>
                <tr>
                    <td> coba</td>
                    <td> ya</td>
                    <td> ges</td>
                    <td> tuk</td>
                    <td> tuk</td>
                    <td> 
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-primary" style="margin-right: 10px;" onclick="editRow(this)">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger" onclick="deleteRow(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>                   
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('script')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new simpleDatatables.DataTable('#myTable');
        });
    </script>
@endpush
