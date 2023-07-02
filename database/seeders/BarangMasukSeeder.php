<?php

namespace Database\Seeders;

use App\Models\BarangMasuk;
use App\Models\Figur;
use App\Models\JenisBarang;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = Figur::where('isPemasok', true)->get()->pluck('id')->toArray();
        $jenisBarang = JenisBarang::all()->pluck('id')->toArray();

        BarangMasuk::create([
            'pemasok_id' => $supplier[3],
            'jenis_barang_id' => $jenisBarang[0],
            'keterangan' => 'Lorem ipsum',
            'tanggal' => Carbon::now()->add(-2, 'day')->toDateString(),
        ]);

        BarangMasuk::create([
            'pemasok_id' => $supplier[3],
            'jenis_barang_id' => $jenisBarang[0],
            'keterangan' => 'Lorem ipsum',
            'tanggal' => Carbon::now()->add(-2, 'day')->toDateString(),
        ]);

        BarangMasuk::create([
            'pemasok_id' => $supplier[0],
            'jenis_barang_id' => $jenisBarang[0],
            'keterangan' => 'Lorem ipsum',
            'tanggal' => Carbon::now()->add(-2, 'day')->toDateString(),
        ]);

        BarangMasuk::create([
            'pemasok_id' => $supplier[2],
            'jenis_barang_id' => $jenisBarang[1],
            'keterangan' => 'Lorem ipsum',
            'tanggal' => Carbon::now()->add(-3, 'day')->toDateString(),
        ]);
    }
}
