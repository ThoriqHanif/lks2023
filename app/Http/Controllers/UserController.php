<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::orderBy('id','asc')->paginate(5);
        return view('user/index')->with('data',$data);
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
            'name'=>'required',
            'level'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ],[
            'name.required'=>'Nama wajib diisi',
            'level.required'=>'level Sekolah wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Masukkan Email yang valid',
            'email.unique'=>'Email sudah digunakan, Silahkan gunakan email yang lain',
            'password.required'=>'Password wajib diisi',
            'password.min'=>'Password minimal 6 karakter',
        ]);

        $data = [
            'name'=>$request->input('name'),
            'level'=>$request->input('level'),
            'email'=>$request->input('email'),
            'password'=>Hash::make( $request->input('password')),
        ];

        User::create($data);
        return redirect('/user')->with('response','Data berhasil ditambah');
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
        $data = User::where('id', $id)->first();
        return view('user/show')->with('data',$data);
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
        $data = User::where('id', $id)->first();
        return view('user/edit')->with('data',$data);
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
            'name'=>'required',
            'level'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6',
        ],[
            'name.required'=>'Nama tidak boleh kosong',
            'level.required'=>'level tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'email.email'=>'Masukkan Email yang valid',
            'password.required'=>'Password tidak boleh kosong',
            'password.min'=>'Password minimal 6 karakter',
        ]);

        $data = [
            'name'=>$request->input('name'),
            'level'=>$request->input('level'),
            'email'=>$request->input('email'),
            'password'=>Hash::make( $request->input('password')),
        ];

        User::where('id', $id)->update($data);
        return redirect('/user')->with('response','Data berhasil di update');
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
