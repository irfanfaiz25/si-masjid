<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenerimaZakat extends Model
{
    protected $fillable = [
        'nama',
        'alamat'
    ];


    public function penerimaan()
    {
        return $this->hasMany(RiwayatPenerimaanZakat::class);
    }
}
