<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class AdminController extends Controller
{
    public function dashboard(Request $request){
     $statuspegawai = DB::table('tb_pegawai')
         ->select('tb_status_pegawai.status')
         ->join('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
         ->join('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
         ->join('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
         ->join('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
         ->join('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
         ->join('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
         ->join('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
         ->join('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
          ->groupBy('tb_status_pegawai.status')
          ->orderBy('tb_status_pegawai.status', 'ASC')
          ->get();
          return view('admin.dashboard', compact('statuspegawai'));
     
    }

    public function getDataJson(Request $request)
    {
         if (isset($request->filter_jenis)) {
             $data = DB::table('tb_pegawai')
             ->select('tb_pegawai.id','tb_pegawai.nik', 'tb_pegawai.nama_lengkap', 'tb_pegawai.jenis_kelamin', 'tb_pegawai.agama', 'tb_pegawai.tempat_lahir', 'tb_pegawai.tanggal_lahir', 'tb_pegawai.status_nikah', 'tb_masa_kerja.masakerja', 'tb_status_pegawai.status', 'tb_jabatan_struktural.jabatan', 'tb_tunjangan_lain.tunjangan', 'tb_kel_kerja.kelompok', 'tb_pegawai.tanggal_masuk', 'tb_pegawai.tanggal_diangkat', 'tb_pegawai.no_ktp', 'tb_pegawai.no_bpjs_kes', 'tb_pegawai.no_bpjs_ketenag', 'tb_pegawai.no_kk', 'tb_tingkat_pendidikan.pendidikan', 'tb_pengalaman_kerja.pengalaman', 'tb_pkwt.nama')
             ->join('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
             ->join('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
             ->join('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
             ->join('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
             ->join('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
             ->join('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
             ->join('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
             ->join('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
             ->where('tb_pegawai.jenis_kelamin', $request->filter_jenis)
             ->get();
         }
         if (isset($request->filter_status)) {
            $data = DB::table('tb_pegawai')
             ->select('tb_pegawai.id','tb_pegawai.nik', 'tb_pegawai.nama_lengkap', 'tb_pegawai.jenis_kelamin', 'tb_pegawai.agama', 'tb_pegawai.tempat_lahir', 'tb_pegawai.tanggal_lahir', 'tb_pegawai.status_nikah', 'tb_masa_kerja.masakerja', 'tb_status_pegawai.status', 'tb_jabatan_struktural.jabatan', 'tb_tunjangan_lain.tunjangan', 'tb_kel_kerja.kelompok', 'tb_pegawai.tanggal_masuk', 'tb_pegawai.tanggal_diangkat', 'tb_pegawai.no_ktp', 'tb_pegawai.no_bpjs_kes', 'tb_pegawai.no_bpjs_ketenag', 'tb_pegawai.no_kk', 'tb_tingkat_pendidikan.pendidikan', 'tb_pengalaman_kerja.pengalaman', 'tb_pkwt.nama')
             ->join('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
             ->join('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
             ->join('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
             ->join('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
             ->join('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
             ->join('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
             ->join('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
             ->join('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
             ->where('tb_status_pegawai.status', $request->filter_status)
             ->get();
         }
         if (isset($request->filter_jenis) && isset($request->filter_status)) {
            $data = DB::table('tb_pegawai')
             ->select('tb_pegawai.id','tb_pegawai.nik', 'tb_pegawai.nama_lengkap', 'tb_pegawai.jenis_kelamin', 'tb_pegawai.agama', 'tb_pegawai.tempat_lahir', 'tb_pegawai.tanggal_lahir', 'tb_pegawai.status_nikah', 'tb_masa_kerja.masakerja', 'tb_status_pegawai.status', 'tb_jabatan_struktural.jabatan', 'tb_tunjangan_lain.tunjangan', 'tb_kel_kerja.kelompok', 'tb_pegawai.tanggal_masuk', 'tb_pegawai.tanggal_diangkat', 'tb_pegawai.no_ktp', 'tb_pegawai.no_bpjs_kes', 'tb_pegawai.no_bpjs_ketenag', 'tb_pegawai.no_kk', 'tb_tingkat_pendidikan.pendidikan', 'tb_pengalaman_kerja.pengalaman', 'tb_pkwt.nama')
             ->join('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
             ->join('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
             ->join('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
             ->join('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
             ->join('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
             ->join('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
             ->join('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
             ->join('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
             ->where('tb_pegawai.jenis_kelamin', $request->filter_jenis)
             ->where('tb_status_pegawai.status', $request->filter_status)
             ->get();
         }

         if (!isset($request->filter_jenis) && !isset($request->filter_status)) {
            $data = DB::table('tb_pegawai')
             ->select('tb_pegawai.id','tb_pegawai.nik', 'tb_pegawai.nama_lengkap', 'tb_pegawai.jenis_kelamin', 'tb_pegawai.agama', 'tb_pegawai.tempat_lahir', 'tb_pegawai.tanggal_lahir', 'tb_pegawai.status_nikah', 'tb_masa_kerja.masakerja', 'tb_status_pegawai.status', 'tb_jabatan_struktural.jabatan', 'tb_tunjangan_lain.tunjangan', 'tb_kel_kerja.kelompok', 'tb_pegawai.tanggal_masuk', 'tb_pegawai.tanggal_diangkat', 'tb_pegawai.no_ktp', 'tb_pegawai.no_bpjs_kes', 'tb_pegawai.no_bpjs_ketenag', 'tb_pegawai.no_kk', 'tb_tingkat_pendidikan.pendidikan', 'tb_pengalaman_kerja.pengalaman', 'tb_pkwt.nama')
             ->join('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
             ->join('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
             ->join('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
             ->join('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
             ->join('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
             ->join('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
             ->join('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
             ->join('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
             ->get();
         }
         return DataTables::of($data)
     //fungsi untuk nambah kolom action, $data itu sesuaikan sama data yang di return buat datatable
    ->addColumn('action', function ($data) {
        return '<a href="'.route('dashboard/edit', $data->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';})
        ->addIndexColumn()
        ->make(true);
    }
      
    public function create() {
        $masa = \App\Masa::all();
        $pegawai = \App\Pegawai::all();
        $jabatan = \App\Jabatan::all();
        $tunjangan = \App\Lain::all();
        $kelompok = \App\Kelompok::all();
        $pendidikan = \App\Pendidikan::all();
        $pengalaman = \App\Pengalaman::all();
        $pkwt = \App\Pkwt::all();
        return view('admin/create', compact('masa', 'pegawai', 'jabatan', 'tunjangan', 'kelompok', 'pendidikan', 'pengalaman', 'pkwt'));
    }
    public function input(Request $request) {
        \App\AdminPegawai::create($request->all());
        return redirect('/dashboard')->with('sukses', 'Data berhasil ditambahkan');
    }
    public function edit($id){
        $masa = \App\Masa::all();
        $pegawai = \App\Pegawai::all();
        $jabatan = \App\Jabatan::all();
        $tunjangan = \App\Lain::all();
        $kelompok = \App\Kelompok::all();
        $pendidikan = \App\Pendidikan::all();
        $pengalaman = \App\Pengalaman::all();
        $pkwt = \App\Pkwt::all();
        $data = DB::table('tb_pegawai')
            ->join('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
            ->join('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
            ->join('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
            ->join('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
            ->join('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
            ->join('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
            ->join('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
            ->join('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
            ->select('tb_pegawai.*', 'tb_masa_kerja.masakerja', 'tb_status_pegawai.status', 'tb_jabatan_struktural.jabatan', 'tb_tunjangan_lain.tunjangan', 'tb_kel_kerja.kelompok', 'tb_tingkat_pendidikan.pendidikan', 'tb_pengalaman_kerja.pengalaman', 'tb_pkwt.nama')
            ->where('tb_pegawai.id', '=', $id)
            ->first();

        return view('admin/edit', compact('masa', 'pegawai', 'jabatan', 'tunjangan', 'kelompok', 'pendidikan', 'pengalaman', 'pkwt', 'data'));

    }
    public function update(Request $request) {
        $data = \App\AdminPegawai::find($request->id);
        $data->update($request->all());
        return redirect('/dashboard')->with('sukses', 'Data berhasil diubah');

    }
}
