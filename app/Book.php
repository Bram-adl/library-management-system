<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The table related to the model.
     * 
     * @var string
     */
    protected $table = 'buku';

    /**
     * Primary key of the related table.
     * 
     * @var string
     */
    protected $primaryKey = 'id_buku';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Properties that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id_buku', 'judul_buku', 'pengarang', 'penerbit', 'th_terbit'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
