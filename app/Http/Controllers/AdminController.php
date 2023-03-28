<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = admin::orderBy('nis','asc')->paginate(5);
        return view('admin/index')->with('data',$data);
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
            'nis'=>'required',
            'nama'=>'required',
            'asal'=>'required',
            'alamat'=>'required',
        ],[
            'nis.required'=>'NIS tidak boleh kosong',
            'nama.required'=>'Nama tidak boleh kosong',
            'asal.required'=>'Asal Sekolah tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong',
        ]);

        $data = [
            'nis'=>$request->input('nis'),
            'nama'=>$request->input('nama'),
            'level'=>value('user'),
            'asal'=>$request->input('asal'),
            'alamat'=>$request->input('alamat'),
        ];

        admin::create($data);
        return redirect('/admin')->with('response','Data berhasil ditambah');
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
        $data = admin::where('nis',$id)->first();
        return view('admin/show')->with('data',$data);
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
        $data = admin::where('nis',$id)->first();
        return view('admin/edit')->with('data',$data);
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
            'nama'=>'required',
            'asal'=>'required',
            'alamat'=>'required',
        ],[
            'nama.required'=>'Nama tidak boleh kosong',
            'asal.required'=>'Asal Sekolah tidak boleh kosong',
            'alamat.required'=>'Alamat tidak boleh kosong',
        ]);

        $data = [
            'nama'=>$request->input('nama'),
            'level'=>value('user'),
            'asal'=>$request->input('asal'),
            'alamat'=>$request->input('alamat'),
        ];

        admin::where('nis', $id)->update($data);
        return redirect('/admin')->with('response','Data berhasil di update');

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
        admin::where('nis', $id)->delete();
        return redirect('/admin')->with('response','Data berhasil dihapus');
    }
}
