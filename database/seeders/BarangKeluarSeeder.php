<?php

namespace Database\Seeders;

use App\Models\BarangKeluar;
use App\Models\Figur;
use App\Models\JenisBarang;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $konsumen = Figur::where('isKonsumen', true)->get()->pluck('id')->toArray();
        $jenisBarang = JenisBarang::all()->pluck('id')->toArray();

        BarangKeluar::create([
            'konsumen_id' => $konsumen[0],
            'jenis_barang_id' => $jenisBarang[0],
            'keterangan' => 'Lorem ipsum',
            'tanggal' => Carbon::now()->toDateString(),
        ]);

        BarangKeluar::create([
            'konsumen_id' => $konsumen[0],
            'jenis_barang_id' => $jenisBarang[0],
            'keterangan' => 'Lorem ipsum',
            'tanggal' => Carbon::now()->toDateString(),
        ]);
    }
}
