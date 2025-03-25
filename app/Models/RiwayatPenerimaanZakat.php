<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenerimaanZakat extends Model
{
    public $fillable = [
        'penerima_zakat_id',
        'jumlah',
        'tahun',
        'status',
    ];


    public function penerima()
    {
        return $this->belongsTo(PenerimaZakat::class, 'penerima_zakat_id', 'id');
    }
}
