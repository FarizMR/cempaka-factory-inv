<?php

namespace Database\Seeders;

use App\Models\JenisBarang;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisBarang::create([
            'nama' => 'Tembakau #A',
        ]);

        JenisBarang::create([
            'nama' => 'Tembakau #B1',
        ]);

        JenisBarang::create([
            'nama' => 'Tembakau #C03',
            'keterangan' => 'Tembakau #C dengan kualitas 3',
        ]);
    }
}
