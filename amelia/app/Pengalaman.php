<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'tb_pengalaman_kerja';
    protected $fillable = ['id', 'pengalaman', 'rating'];
    public $timestamps = false;
}
