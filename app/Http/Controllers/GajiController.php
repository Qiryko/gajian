<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gaji;

class GajiController extends Controller
{
    public function index(){
        //  case when  
        // ROUND((TIMESTAMPDIFF(MONTH, tpeg.tanggal_masuk,now())/12)*tbmk.nilai,2) is null then 0
        // else ROUND((TIMESTAMPDIFF(MONTH, tpeg.tanggal_masuk,now())/12)*tbmk.nilai,2)
        $data = DB::select('SELECT tpeg.id, tpeg.nama_lengkap, 
        ROUND((TIMESTAMPDIFF(MONTH, tpeg.tanggal_masuk,now())/12)*tbmk.nilai,2) as skor_masaker, 
        ttp.rating*tbtp.nilai as skor_tingkatpdk, 
        tpk.rating*tbpk.nilai as skor_pengker, 
        tkk.rating*tbkk.nilai as skor_kelker,
        ((tmk.masakerja*tbmk.nilai)+(ttp.rating*tbtp.nilai)+(tpk.rating*tbpk.nilai)+(tkk.rating*tbkk.nilai)) as total_skor,
        "102.500" as pengali,
        (((tmk.masakerja*tbmk.nilai)+(ttp.rating*tbtp.nilai)+(tpk.rating*tbpk.nilai)+(tkk.rating*tbkk.nilai))*102500) as gaji_pokok,
        tjs.tunjangan+tsp.tunjanganJHT+tsp.intensif+tsp.transport+tsp.makan+tjl.jumlah as tunjangan,
        (((tmk.masakerja*tbmk.nilai)+(ttp.rating*tbtp.nilai)+(tpk.rating*tbpk.nilai)+(tkk.rating*tbkk.nilai))*102500)
        +
        (tjs.tunjangan+tsp.tunjanganJHT+tsp.intensif+tsp.transport+tsp.makan+tjl.jumlah) as total 
         from tb_pegawai tpeg 
        	join tb_masa_kerja tmk on tmk.id = tpeg.masa_kerja 
        	join tb_status_pegawai tsp on tsp.id = tpeg.status_pegawai
        	join tb_jabatan_struktural tjs on tjs.id = tpeg.jabatan_struktural 
        	join tb_tunjangan_lain tjl on tjl.id = tpeg.tunjangan_lain 
        	join tb_kel_kerja tkk on tkk.id = tpeg.kel_pekerjaan
        	join tb_tingkat_pendidikan ttp on ttp.id = tpeg.tingkat_pendidikan
        	join tb_pengalaman_kerja tpk on tpk.id = tpeg.pengalaman_kerja
            join tb_pkwt tp on tp.id = tpeg.pkwt
            join tb_bobot tbmk on tbmk.id = tmk.id_bobot
            join tb_bobot tbtp on tbtp.id = ttp.id_bobot
            join tb_bobot tbpk on tbpk.id = tpk.id_bobot
            join tb_bobot tbkk on tbkk.id = tkk.id_bobot');
        return view('gaji.index', ['data' => $data]);
        // $dataMasa = \App\Masa::all();
        // return view('gaji.index');
    }
    
    public function simpan(Request $request){
        $tanggal = $request->tgl;
        $data = DB::select('SELECT tpeg.id, tpeg.nama_lengkap, 
        ROUND((TIMESTAMPDIFF(MONTH, tpeg.tanggal_masuk,now())/12)*tbmk.nilai,2) as skor_masaker, 
        -- tmk.masakerja*tbmk.nilai as skor_masaker, 
        ttp.rating*tbtp.nilai as skor_tingkatpdk, 
        tpk.rating*tbpk.nilai as skor_pengker, 
        tkk.rating*tbkk.nilai as skor_kelker,
        ROUND((((TIMESTAMPDIFF(MONTH, tpeg.tanggal_masuk,now())/12)*tbmk.nilai)+(ttp.rating*tbtp.nilai)+(tpk.rating*tbpk.nilai)+(tkk.rating*tbkk.nilai)),2) as total_skor,
        "102,500" as pengali,
        ROUND(((((TIMESTAMPDIFF(MONTH, tpeg.tanggal_masuk,now())/12)*tbmk.nilai)+(ttp.rating*tbtp.nilai)+(tpk.rating*tbpk.nilai)+(tkk.rating*tbkk.nilai))*102500),2) as gaji_pokok,
        tjs.tunjangan+tsp.tunjanganJHT+tsp.intensif+tsp.transport+tsp.makan+tjl.jumlah as tunjangan,
        ROUND(((((TIMESTAMPDIFF(MONTH, tpeg.tanggal_masuk,now())/12)*tbmk.nilai)+(ttp.rating*tbtp.nilai)+(tpk.rating*tbpk.nilai)+(tkk.rating*tbkk.nilai))*102500)
        +
        (tjs.tunjangan+tsp.tunjanganJHT+tsp.intensif+tsp.transport+tsp.makan+tjl.jumlah),2) as total 
         from tb_pegawai tpeg 
        	-- join tb_masa_kerja tmk on tmk.id = tpeg.masa_kerja 
        	join tb_status_pegawai tsp on tsp.id = tpeg.status_pegawai
        	join tb_jabatan_struktural tjs on tjs.id = tpeg.jabatan_struktural 
        	join tb_tunjangan_lain tjl on tjl.id = tpeg.tunjangan_lain 
        	join tb_kel_kerja tkk on tkk.id = tpeg.kel_pekerjaan
        	join tb_tingkat_pendidikan ttp on ttp.id = tpeg.tingkat_pendidikan
        	join tb_pengalaman_kerja tpk on tpk.id = tpeg.pengalaman_kerja
            join tb_pkwt tp on tp.id = tpeg.pkwt
            join tb_bobot tbmk on tbmk.id = tpeg.masa_kerja
            join tb_bobot tbtp on tbtp.id = ttp.id_bobot
            join tb_bobot tbpk on tbpk.id = tpk.id_bobot
            join tb_bobot tbkk on tbkk.id = tkk.id_bobot');
        foreach($data as $row){
            $gaji = new Gaji;
            $gaji->pegawai = $row->id;
            $gaji->nama = $row->nama_lengkap;
            $gaji->skor_masakerja = $row->skor_masaker;
            $gaji->skor_tingkatpendidikan = $row->skor_tingkatpdk;
            $gaji->skor_pengalamankerja = $row->skor_pengker;
            $gaji->skor_kelompokkerja = $row->skor_kelker;
            $gaji->skor_total = $row->total_skor; 
            $gaji->pengali = "102500";
            $gaji->gaji_pokok = $row->gaji_pokok;
            $gaji->tunjangan = $row->tunjangan;
            $gaji->total_gaji = $row->total;
            $gaji->tanggal_simpan = $tanggal;  
            $gaji->save(); 
        }
        return redirect('/gaji')->with('sukses', 'Data berhasil ditambahkan');
        // return redirect('/gaji/index');
        // $dataMasa = \App\Masa::all();
        // return view('gaji.index');
    }
}
