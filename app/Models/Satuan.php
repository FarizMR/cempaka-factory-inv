<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Satuan extends Model
{
    use HasUuids;

    public $table = 'satuans';
    public $incrementing = false;
    public $keyType = 'string';

    public $fillable = [
        'nama',
    ];

    public function jumlahBarangMasuk()
    {
        return $this->hasMany(JumlahBarangMasuk::class);
    }

    public function jumlahBarangKeluar()
    {
        return $this->hasMany(JumlahBarangKeluar::class);
    }
}
