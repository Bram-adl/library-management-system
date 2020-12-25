<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circulation extends Model
{
    protected $table = 'sirkulasi';
    protected $primaryKey = 'id_sirkulasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_sirkulasi', 'id_buku', 'id_anggota', 'tanggal_pinjam', 'tanggal_kembali'];
    public $timestamps = false;
}
