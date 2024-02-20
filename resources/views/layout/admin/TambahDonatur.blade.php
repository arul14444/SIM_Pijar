@extends('layout.admin.MasterAdmin')
@section('title','Tambah Donatur')
@section('route')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Managemen Donatur</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection
@section('content')
    <form>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                    <label for="inputFirstName">First name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                    <label for="inputLastName">Last name</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
            <label for="inputEmail">Email address</label>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                    <label for="inputPassword">Password</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                    <label for="inputPasswordConfirm">Confirm Password</label>
                </div>
            </div>
        </div>
        <div class="mt-4 mb-0">
            <div class="d-grid"><a class="btn btn-primary btn-block" href="login.html">Create Account</a></div>
        </div>
    </form>
@endsection