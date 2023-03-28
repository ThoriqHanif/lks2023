<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\barang;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        
        return view('dashboard/welcome');
    }
    public function admin()
    {
        $barang = barang::count();
        $siswa = admin::count();
        $user = User::where('level','user')->count();
        $admin = User::where('level','admin')->count();
        return view('dashboard/admin', compact('barang','siswa','user','admin'));
    }
}
