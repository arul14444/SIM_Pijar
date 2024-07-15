<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function masuk(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if(Auth::attempt($credentials)){
            if(Auth::user()->flag_aktif == false){
                return redirect('/logout-error');
            }
            if(Auth::user()->role == 'admin'){
                return redirect('/dashboard/admin');
            }elseif(Auth::user()->role == 'anggota'){
                return redirect('/dashboard/anggota');
            }
        } else {
            // Login gagal, kembalikan dengan pesan kesalahan
            return redirect()->back()->withErrors('Username atau password salah')->withInput();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('');
    }
    public function logoutWithError(){
        Auth::logout();
        return redirect()->back()->withErrors('Akun anda tidak aktif, silahkan hubungi admin');
    }
}
