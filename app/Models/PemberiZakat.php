<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemberiZakat extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
    ];


    public function pemberian()
    {
        return $this->hasMany(RiwayatPemberianZakat::class);
    }
}
