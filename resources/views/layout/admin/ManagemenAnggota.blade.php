@extends('layout.admin.MasterAdmin')
@section('title', 'Managemen Anggota')
@section('route')
    <li class="breadcrumb-item active"> Managemen Anggota</li>
@endsection

@section('content')
    
    <table id="myTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td> test</td>
                <td> test</td>
                <td> test</td>
                <td> test</td>
                <td> test</td>
                <td> test</td>
            </tr>
            <tr>
                <td> tust</td>
                <td> tust</td>
                <td> tust</td>
                <td> tust</td>
                <td> tust</td>
                <td> tust</td>
            </tr>
        </tbody>
    </table>
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
