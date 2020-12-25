<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'log_pinjam';
    protected $primaryKey = 'id_log';
    public $timestamps = false;
}
