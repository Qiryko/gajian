<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPegawai extends Model
{
    protected $table = 'tb_pegawai';
    protected $fillable = ['id', 'nik', 'nama_lengkap', 'jenis_kelamin', 'agama', 'tempat_lahir', 'tanggal_lahir', 'status_nikah', 'masa_kerja', 'status_pegawai', 'jabatan_struktural', 'tunjangan_lain', 'kel_pekerjaan', 'tanggal_masuk', 'tanggal_diangkat', 'no_ktp', 'no_bpjs_kes', 'no_bpjs_ketenag', 'no_kk', 'tingkat_pendidikan', 'pengalaman_kerja', 'pkwt'];
    public $timestamps = false;
}
