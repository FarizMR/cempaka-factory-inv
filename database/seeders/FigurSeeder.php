<?php

namespace Database\Seeders;

use App\Models\Figur;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FigurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Figur::create([
            'nama' => 'Pak Budi',
            'isPemasok' => true,
        ]);

        Figur::create([
            'nama' => 'Pak Beni',
            'isPemasok' => true,
        ]);

        Figur::create([
            'nama' => 'Pak Kashartadi',
            'isPemasok' => true,
        ]);

        Figur::create([
            'nama' => 'PT Abadi Sentosa',
            'isPemasok' => true,
        ]);

        Figur::create([
            'nama' => 'Toko Tembakau Bintuni',
            'isKonsumen' => true,
        ]);
    }
}
