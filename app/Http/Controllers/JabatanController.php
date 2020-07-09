<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    public function index(){
        $dataJabatan = Jabatan::all();
        return view('jabatan.index',['dataJabatan' => $dataJabatan]);
    }
    public function create(Request $request) {
        \App\Jabatan::create($request->all());
        return redirect('/jabatan')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){


        $jabatan = Jabatan::find($id);

        return view('jabatan/edit', ['jabatan' => $jabatan]);

    }
    public function update(Request $request) {
        $jabatan = Jabatan::find($request->id);
        // dd($request);
        $jabatan->update($request->all());
        return redirect('/jabatan')->with('sukses', 'Data berhasil diubah');

    }
    public function destroy($id){
        $jabatan = Jabatan::find($id);
        $jabatan->forceDelete();
        return redirect('/jabatan')->with('sukses', 'Data berhasil dihapus');
    }
}
