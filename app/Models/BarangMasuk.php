<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class BarangMasuk extends Model
{
    use HasUuids;

    public $table = 'barang_masuks';
    public $incrementing = false;
    public $keyType = 'string';

    public function figur()
    {
        return $this->belongsTo(Figur::class, 'pemasok_id');
    }

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }

    public function jumlah_barang_masuk()
    {
        return $this->hasMany(JumlahBarangMasuk::class, 'barang_masuk_id');
    }
}
