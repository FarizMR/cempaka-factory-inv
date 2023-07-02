<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JumlahBarangMasuk extends Model
{
    use HasUuids;

    public $table = 'jumlah_barang_masuks';
    public $incrementing = false;
    public $keyType = 'string';

    public $fillable = [
        'barang_masuk_id',
        'satuan_id',
        'jumlah',
    ];

    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
