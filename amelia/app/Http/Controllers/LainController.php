<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LainController extends Controller
{
    public function index(){
        $dataTunjangan = \App\Lain::all();
        return view('tunjangan.index',['dataTunjangan' => $dataTunjangan]);
    }
    public function create(Request $request) {
        \App\Lain::create($request->all());
        return redirect('/tunjangan')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $tunjangan = \App\Lain::find($id);
        return view('tunjangan/edit', ['tunjangan' => $tunjangan]);

    }
    public function update(Request $request) {
        $tunjangan = \App\Lain::find($request->id);
        $tunjangan->update($request->all());
        return redirect('/tunjangan')->with('sukses', 'Data berhasil diubah');

    }
    public function destroy($id){
        $tunjangan = \App\Lain::find($id);
        $tunjangan->forceDelete();
        return redirect('/tunjangan')->with('sukses', 'Data berhasil dihapus');
    }
}
