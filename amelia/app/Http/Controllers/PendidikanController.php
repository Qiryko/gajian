<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index(){
        $dataPendidikan = \App\Pendidikan::all();
        return view('pendidikan.index',['dataPendidikan' => $dataPendidikan]);
    }
    public function create(Request $request) {
        \App\Pendidikan::create($request->all());
        return redirect('/pendidikan')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $pendidikan = \App\Pendidikan::find($id);
        return view('pendidikan/edit', ['pendidikan' => $pendidikan]);

    }
    public function update(Request $request) {
        $pendidikan = \App\Pendidikan::find($request->id);
        $pendidikan->update($request->all());
        return redirect('/pendidikan')->with('sukses', 'Data berhasil diubah');

    }
    public function destroy($id){
        $pendidikan = \App\Pendidikan::find($id);
        $pendidikan->forceDelete();
        return redirect('/pendidikan')->with('sukses', 'Data berhasil dihapus');
    }
}
