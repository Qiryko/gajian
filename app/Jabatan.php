<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'tb_jabatan_struktural';
    protected $fillable = ['id', 'jabatan', 'tunjangan'];
    public $timestamps = false;
}
