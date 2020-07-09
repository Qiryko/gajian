<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'tb_gaji';
    protected $fillable = ['id', 'nama', 'skor_masakerja', 'skor_tingkatpendidikan','skor_pengalamankerja','skor_kelompokkerja','skor_total','pengali','gaji_pokok','tunjangan','total_gaji','tanggal_simpan'];
    public $timestamps = false;
}