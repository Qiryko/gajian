<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    public function index(){
        $dataPengalaman = \App\Pengalaman::all();
        return view('pengalaman.index',['dataPengalaman' => $dataPengalaman]);
    }
    public function create(Request $request) {
        \App\Pengalaman::create($request->all());
        return redirect('/pengalaman')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $pengalaman = \App\Pengalaman::find($id);
        return view('pengalaman/edit', ['pengalaman' => $pengalaman]);

    }
    public function update(Request $request) {
        $pengalaman = \App\Pengalaman::find($request->id);
        $pengalaman->update($request->all());
        return redirect('/pengalaman')->with('sukses', 'Data berhasil diubah');

    }
    public function destroy($id){
        $pengalaman = \App\Pengalaman::find($id);
        $pengalaman->forceDelete();
        return redirect('/pengalaman')->with('sukses', 'Data berhasil dihapus');
    }
}
