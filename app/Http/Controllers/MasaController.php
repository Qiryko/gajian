<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasaController extends Controller
{
    public function index(){
        $dataMasa = \App\Masa::all();
        return view('masa.index',['dataMasa' => $dataMasa]);
    }
    public function create(Request $request) {
        \App\Masa::create($request->all());
        return redirect('/masa')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $masa = \App\Masa::find($id);
        return view('masa/edit', ['masa' => $masa]);

    }
    public function update(Request $request) {
        $masa = \App\Masa::find($request->id);
        $masa->update($request->all());
        return redirect('/masa')->with('sukses', 'Data berhasil diubah');

    }
        public function destroy($id){
        $masa = \App\Masa::find($id);
        $masa->forceDelete();
        return redirect('/masa')->with('sukses', 'Data berhasil dihapus');
    }
}
