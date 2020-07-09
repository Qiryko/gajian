<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(){
        $dataPegawai = \App\Pegawai::all();
        return view('pegawai.index',['dataPegawai' => $dataPegawai]);
    }
    public function create(Request $request) {
        \App\Pegawai::create($request->all());
        return redirect('/pegawai')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $pegawai = \App\Pegawai::find($id);
        return view('pegawai/edit', ['pegawai' => $pegawai]);

    }
    public function update(Request $request) {
        $pegawai = \App\Pegawai::find($request->id);
        $pegawai->update($request->all());
        return redirect('/pegawai')->with('sukses', 'Data berhasil diubah');

    }
    public function destroy($id){
        $pegawai = \App\Pegawai::find($id);
        $pegawai->forceDelete();
        return redirect('/pegawai')->with('sukses', 'Data berhasil dihapus');
    }
}
