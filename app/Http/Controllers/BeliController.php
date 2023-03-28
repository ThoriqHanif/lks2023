<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\buku;
use App\Models\User;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = barang::orderBy('id','asc')->paginate(5);
        return view('beli/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $data = barang::join('users','users.id','=','barang.id')
                ->select('barang.*','users.name')
                ->get()
                ->where('nis',$id);

        $user = User::all();
        return view('beli/create', compact('data',$data))->with('user',$user);
        
        // return view('beli/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = barang::join('users','users.id','=','barang.id')
                ->select('barang.*','users.name')
                ->get();

        $user = User::all()->create($data);
        return view('/transaksi', compact('data',$data))->with('user',$user);

        // barang::create($data);
        // return redirect('/transaksi')->with('response','Barang berhasil dibeli');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
