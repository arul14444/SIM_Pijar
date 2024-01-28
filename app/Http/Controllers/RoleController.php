<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        echo"tedsyt";
    }
    
    public function admin(){
        echo"admin";
        // return view('admin/halamUtama');
    }
    public function anggotan(){
        return view('anggota/halamUtama');
    }
}
