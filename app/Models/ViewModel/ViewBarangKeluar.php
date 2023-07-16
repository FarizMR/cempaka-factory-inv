<?php

namespace App\Models\ViewModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewBarangKeluar extends Model
{
    public $table = 'view_barang_keluar';

    public $casts = [
        'id' => 'string',
    ];
}
