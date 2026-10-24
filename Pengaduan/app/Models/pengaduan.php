<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'email',
        'no_meja',
        'name',
        'no_tp',
        'kategori',
        'deskripsi',
        'foto',
    ];

    public function shengyang()
    {
        return $this->belongsTo(
            kategori::class,
            'kategori',
            
        );
    }
}