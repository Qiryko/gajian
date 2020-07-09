<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'tb_kel_kerja';
    protected $fillable = ['id', 'kelompok', 'rating'];
    public $timestamps = false;
}
