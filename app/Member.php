<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * 
     * @var string 
     * */
    protected $table = "anggota";

    /**
     * 
     * @var array
     */
    protected $fillable = [
        'id_anggota','nama','jk','alamat','no_hp'
    ];

    /**
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * 
     * @var string
     */
    protected $keyType = 'string';

     /**
     * Primary key of the related table.
     * 
     * @var string
     */
    protected $primaryKey = 'id_anggota';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
}

