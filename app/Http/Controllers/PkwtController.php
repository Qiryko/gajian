<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PkwtController extends Controller
{
    public function index(){
        $dataPkwt = \App\Pkwt::all();
        return view('pkwt.index',['dataPkwt' => $dataPkwt]);
    }
    public function create(Request $request) {
        \App\Pkwt::create($request->all());
        return redirect('/pkwt')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $pkwt = \App\Pkwt::find($id);
        return view('pkwt/edit', ['pkwt' => $pkwt]);

    }
    public function update(Request $request) {
        $pkwt = \App\Pkwt::find($request->id);
        $pkwt->update($request->all());
        return redirect('/pkwt')->with('sukses', 'Data berhasil diubah');

    }
    public function destroy($id){
        $pkwt = \App\Pkwt::find($id);
        $pkwt->forceDelete();
        return redirect('/pkwt')->with('sukses', 'Data berhasil dihapus');
    }
}
