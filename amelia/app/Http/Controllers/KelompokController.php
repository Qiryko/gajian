<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelompokController extends Controller
{
    public function index(){
        $dataKelompok = \App\Kelompok::all();
        return view('kelompok.index',['dataKelompok' => $dataKelompok]);
    }
    public function create(Request $request) {
        \App\Kelompok::create($request->all());
        return redirect('/kelompok')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $kelompok = \App\Kelompok::find($id);
        return view('kelompok/edit', ['kelompok' => $kelompok]);

    }
    public function update(Request $request) {
        $kelompok = \App\Kelompok::find($request->id);
        $kelompok->update($request->all());
        return redirect('/kelompok')->with('sukses', 'Data berhasil diubah');

    }
    public function destroy($id){
        $kelompok = \App\Kelompok::find($id);
        $kelompok->forceDelete();
        return redirect('/kelompok')->with('sukses', 'Data berhasil dihapus');
    }
}
