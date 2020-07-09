<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pkwt extends Model
{
    protected $table = 'tb_pkwt';
    protected $fillable = ['id', 'nama', 'gaji'];
    public $timestamps = false;
}
