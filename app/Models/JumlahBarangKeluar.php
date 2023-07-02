<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JumlahBarangKeluar extends Model
{
    use HasUuids;

    public $table = 'jumlah_barang_keluars';
    public $incrementing = false;
    public $keyType = 'string';

    public $fillable = [
        'barang_keluar_id',
        'satuan_id',
        'jumlah',
    ];

    public function barangKeluar()
    {
        return $this->belongsTo(BarangKeluar::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
}
