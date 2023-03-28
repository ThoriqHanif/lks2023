<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use App\Models\User;
use Illuminate\Http\Request;

date_default_timezone_set('Asia/Jakarta');
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MEMBUAT RELASI DENGAN TABLE KATEGORI
        $data = barang::join('kategori','kategori.id','=','barang.id_kategori')
                ->select('barang.*','kategori.nama_kategori')
                ->get();

        $kategori = kategori::all();
        return view('barang/index', compact('data',$data))->with('kategori',$kategori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            // 'id_kategori'=>'required',
            'nama_barang'=>'required',
            'harga'=>'required',
            'stok'=>'required',
        ],[
            'nama_barang.required'=>'Nama barang wajib diisi',
            'harga.required'=>'Harga wajib diisi',
            'stok.required'=>'Stok wajib diisi',
        ]);

        $barang= barang::create([
            'id_kategori'=>$request->input('id_kategori'),
            'nama_barang'=>$request->input('nama_barang'),
            'harga'=>$request->input('harga'),
            'stok'=>$request->input('stok'),
            'created_at'=> date('Y-m-d h:i:s'),
            'updated_at'=> date('Y-m-d h:i:s'),
        ]);

        return redirect('/barang')->with('response','Data berhasil ditambah');

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
        $data = barang::join('kategori','kategori.id','=','barang.id_kategori')
                ->select('barang.*','kategori.nama_kategori','harga','stok')
                ->get()
                ->where('id',$id)->first();


        $kategori = kategori::all(); 
        return view('barang/edit', compact('data',$data))->with('kategori',$kategori);

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
        $request->validate([
            'nama_barang'=>'required',
            'id_kategori'=>'required',
            'harga'=>'required',
        ],[
            'nama_barang.required'=> 'Nama Barang wajib diisi',
            'id_kategori.required'=> 'Nama Barang wajib diisi',
            'harga.required'=> 'Nama Barang wajib diisi',
        ]);


        $barang = barang::findOrFail($id);
        $barang->id_kategori = $request->id_kategori;
        // $barang->updated_at = date('Y-m-d h:i:s');

        $barang->save();
        return redirect('/barang')->with('response','Data berhasil diupdate');
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
        $barang = barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('response','Data berhasil dihapus');
    }
}
