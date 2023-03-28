<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\buku;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        
        $data = barang::join('users','users.id','=','barang.id')
                ->select('barang.*','users.name')
                ->get();

        $user = User::all();
        return view('transaksi/index', compact('data',$data))->with('user',$user);
    } 

}
