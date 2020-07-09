<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'tb_status_pegawai';
    protected $fillable = ['id', 'status', 'tunjanganJHT', 'intensif', 'transport', 'makan'];
    public $timestamps = false;
}
