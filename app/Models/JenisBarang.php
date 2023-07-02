<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisBarang extends Model
{
    use HasUuids;

    public $table = 'jenis_barangs';
    public $incrementing = false;
    public $keyType = 'string';

    public $fillable = [
        'nama',
    ];

    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
