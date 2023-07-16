<?php

namespace App\Models\ViewModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewBarangMasuk extends Model
{
    public $table = 'view_barang_masuk';

    public $casts = [
        'id' => 'string',
    ];
}
