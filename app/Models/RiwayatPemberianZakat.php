<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPemberianZakat extends Model
{
    protected $fillable = [
        'pemberi_zakat_id',
        'jumlah',
        'tahun'
    ];


    public function pemberi()
    {
        return $this->belongsTo(PemberiZakat::class, 'pemberi_zakat_id', 'id');
    }
}
