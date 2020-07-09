<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class RiwayatController extends Controller
{
    public function index(Request $request){
     $tanggal = DB::table('tb_gaji')
         ->select('tanggal_simpan')
          ->groupBy('tanggal_simpan')
          ->orderBy('tanggal_simpan', 'ASC')
          ->get();
          return view('riwayat.riwayat', compact('tanggal'));
     
    }

    public function getDataJson1(Request $request)
    {
         if (isset($request->filter_tanggal)) {
                  $data = DB::table('tb_gaji')
            ->select('tb_tingkat_pendidikan.pendidikan', 'tb_masa_kerja.masakerja', 'tb_gaji.skor_total', 'tb_gaji.pengali', 'tb_gaji.gaji_pokok', 'tb_pegawai.tanggal_masuk', 'tb_pegawai.tanggal_diangkat', 'tb_gaji.nama', 'tb_jabatan_struktural.tunjangan', 'tb_status_pegawai.makan', 'tb_status_pegawai.transport', 'tb_status_pegawai.tunjanganJHT', 'tb_status_pegawai.intensif', 'tb_tunjangan_lain.jumlah', 'tb_gaji.tunjangan as tunj', 'tb_gaji.total_gaji', 'tb_gaji.tanggal_simpan')
            ->leftJoin('tb_pegawai', 'tb_gaji.pegawai', '=', 'tb_pegawai.id')
            ->leftJoin('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
            ->leftJoin('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
            ->leftJoin('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
            ->leftJoin('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
            ->leftJoin('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
            ->leftJoin('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
            ->leftJoin('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
            ->leftJoin('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
            // ->select('tb_pegawai.*', 'tb_masa_kerja.masakerja', 'tb_status_pegawai.status', 'tb_jabatan_struktural.jabatan', 'tb_tunjangan_lain.tunjangan', 'tb_kel_kerja.kelompok', 'tb_tingkat_pendidikan.pendidikan', 'tb_pengalaman_kerja.pengalaman', 'tb_pkwt.nama')
            ->where('tanggal_simpan', $request->filter_tanggal)
            // $data = DB::table('tb_gaji')
            //  ->select('id', 'nama', 'skor_masakerja', 'skor_tingkatpendidikan', 'skor_pengalamankerja', 'skor_kelompokkerja', 'skor_total', 'pengali', 'gaji_pokok', 'tunjangan', 'total_gaji', 'tanggal_simpan')
            //  ->where('tanggal_simpan', $request->filter_tanggal)
             ->get();
         }
         if (!isset($request->filter_tanggal)) {
              $data = DB::table('tb_gaji')
            ->select('tb_tingkat_pendidikan.pendidikan', 'tb_masa_kerja.masakerja', 'tb_gaji.skor_total', 'tb_gaji.pengali', 'tb_gaji.gaji_pokok', 'tb_pegawai.tanggal_masuk', 'tb_pegawai.tanggal_diangkat', 'tb_gaji.nama', 'tb_jabatan_struktural.tunjangan', 'tb_status_pegawai.makan', 'tb_status_pegawai.transport', 'tb_status_pegawai.tunjanganJHT', 'tb_status_pegawai.intensif', 'tb_tunjangan_lain.jumlah', 'tb_gaji.tunjangan as tunj', 'tb_gaji.total_gaji', 'tb_gaji.tanggal_simpan')
            ->leftJoin('tb_pegawai', 'tb_gaji.pegawai', '=', 'tb_pegawai.id')
            ->leftJoin('tb_masa_kerja', 'tb_pegawai.masa_kerja', '=', 'tb_masa_kerja.id')
            ->leftJoin('tb_status_pegawai', 'tb_pegawai.status_pegawai', '=', 'tb_status_pegawai.id')
            ->leftJoin('tb_jabatan_struktural', 'tb_pegawai.jabatan_struktural', '=', 'tb_jabatan_struktural.id')
            ->leftJoin('tb_tunjangan_lain', 'tb_pegawai.tunjangan_lain', '=', 'tb_tunjangan_lain.id')
            ->leftJoin('tb_kel_kerja', 'tb_pegawai.kel_pekerjaan', '=', 'tb_kel_kerja.id')
            ->leftJoin('tb_tingkat_pendidikan', 'tb_pegawai.tingkat_pendidikan', '=', 'tb_tingkat_pendidikan.id')
            ->leftJoin('tb_pengalaman_kerja', 'tb_pegawai.pengalaman_kerja', '=', 'tb_pengalaman_kerja.id')
            ->leftJoin('tb_pkwt', 'tb_pegawai.pkwt', '=', 'tb_pkwt.id')
            // ->select('tb_pegawai.*', 'tb_masa_kerja.masakerja', 'tb_status_pegawai.status', 'tb_jabatan_struktural.jabatan', 'tb_tunjangan_lain.tunjangan', 'tb_kel_kerja.kelompok', 'tb_tingkat_pendidikan.pendidikan', 'tb_pengalaman_kerja.pengalaman', 'tb_pkwt.nama')
            // $data = DB::table('tb_gaji')
            //  ->select('id', 'nama', 'skor_masakerja', 'skor_tingkatpendidikan', 'skor_pengalamankerja', 'skor_kelompokkerja', 'skor_total', 'pengali', 'gaji_pokok', 'tunjangan', 'total_gaji', 'tanggal_simpan')
             ->get();
         }
          // dd($data);exit();
         return DataTables::of($data)->addIndexColumn()->make(true);
     //fungsi untuk nambah kolom action, $data itu sesuaikan sama data yang di return buat datatable
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
        $data = DB::table('tb_gaji')
            ->select('tb_tingkat_pendidikan.pendidikan', 'tb_masa_kerja.masakerja', 'tb_gaji.skor_total', 'tb_gaji.pengali', 'tb_gaji.gaji_pokok', 'tb_pegawai.tanggal_masuk', 'tb_pegawai.tanggal_diangkat', 'tb_pegawai.nama_lengkap', 'tb_jabatan_struktural.tunjangan', 'tb_status_pegawai.makan', 'tb_status_pegawai.transport', 'tb_status_pegawai.tunjanganJHT', 'tb_status_pegawai.intensif', 'tb_tunjangan_lain.jumlah', 'tb_gaji.tunjangan', 'tb_gaji.total_gaji')
            ->join('tb_pegawai', 'tb_gaji.pegawai', '=', 'tb_pegawai.id')
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
    public function update(Request $request, $id) {
        $data = \App\AdminPegawai::find($id);
        $data->update($request->all());
        return redirect('/dashboard')->with('sukses', 'Data berhasil diubah');

    }
}
