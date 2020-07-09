<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function index(){
        $dataBobot = \App\Bobot::all();
        return view('bobot.index',['dataBobot' => $dataBobot]);
    }
    public function create(Request $request) {
        \App\Bobot::create($request->all());
        return redirect('/bobot')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $bobot = \App\Bobot::find($id);
        return view('bobot/edit', ['bobot' => $bobot]);

    }
    public function update(Request $request) {
        $bobot = \App\Bobot::find($request->id);
        $bobot->update($request->all());
        return redirect('/bobot')->with('sukses', 'Data berhasil diubah');

    }
}
