<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    protected $table = 'tb_bobot';
    protected $fillable = ['id', 'bobot', 'nilai'];
    public $timestamps = false;
}
