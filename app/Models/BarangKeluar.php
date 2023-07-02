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
}
