<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'tb_tingkat_pendidikan';
    protected $fillable = ['id', 'pendidikan', 'rating'];
    public $timestamps = false;
}
