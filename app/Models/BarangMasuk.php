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
}
