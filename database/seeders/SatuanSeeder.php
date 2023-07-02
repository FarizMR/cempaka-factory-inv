<?php

namespace Database\Seeders;

use App\Models\Satuan;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satuan::create([
            'nama' => 'Kilogram',
        ]);

        Satuan::create([
            'nama' => 'Pcs',
        ]);
    }
}
