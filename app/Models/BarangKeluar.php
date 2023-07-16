<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class BarangKeluar extends Model
{
    use HasUuids;

    public $table = 'barang_keluars';
    public $incrementing = false;
    public $keyType = 'string';

    public function figur()
    {
        return $this->belongsTo(Figur::class, 'konsumen_id');
    }

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }

    public function jumlah_barang_keluar()
    {
        return $this->hasMany(JumlahBarangKeluar::class, 'barang_keluar_id');
    }
}
