<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Figur extends Model
{
    
    use HasUuids;

    public $table = 'figurs';
    public $incrementing = false;
    public $keyType = 'string';

    public $fillable = [
        'nama',
    ];
}
