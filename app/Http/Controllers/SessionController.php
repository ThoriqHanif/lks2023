<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    //
    function index()
    {
        return view('sesi/index');
    }

    function register()
    {
        return view('sesi/register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Email wajib diisi',
        ]);

        $data = [
            'name'=>$request->name,
            'level'=>$request->level,
        ];

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (auth()->attempt($infologin)) {
            if (auth()->user()->level === 'admin') {
                return redirect()->intended('welcome/admin')->with('data',$data);
            }
            return redirect()->intended('welcome')->with('data',$data);
        }
        return redirect('login')->withErrors('Email atau Password salah');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ],[
            'name.required'=>'Nama wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Masukkan Email yang valid',
            'email.unique'=>'Email telah digunakan, Silahkan gunakan Email yang lain',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Password minimal 6 Karakter',
        ]);
        $data = [
            'name'=>$request->name,
            'level'=>value('user'),
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];

        User::create($data);


        $infologin = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)) {
            return redirect('login')->with('response','Berhasil Daftar');
        }
        return redirect('register')->withErrors('Masukkan Data degan benar');
    }

    function logout()
    {
        Auth::logout();
        return redirect('login')->with('response','Berhasil Logout');
    }
}
    