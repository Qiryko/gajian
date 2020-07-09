<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lain extends Model
{
    protected $table = 'tb_tunjangan_lain';
    protected $fillable = ['id', 'tunjangan', 'jumlah'];
    public $timestamps = false;
}
