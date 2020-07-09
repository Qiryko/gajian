<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masa extends Model
{
    protected $table = 'tb_masa_kerja';
    protected $fillable = ['id', 'masakerja'];
    public $timestamps = false;
}
