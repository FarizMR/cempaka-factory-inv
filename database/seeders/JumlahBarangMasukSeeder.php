<?php

namespace Database\Seeders;

use App\Models\Satuan;
use App\Models\BarangMasuk;
use App\Models\JumlahBarangMasuk;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JumlahBarangMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang_masuk = BarangMasuk::all()->pluck('id')->toArray();
        $satuan = Satuan::all()->pluck('id')->toArray();

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[0],
            'satuan_id' => $satuan[0],
            'jumlah' => 378,
        ]);

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[0],
            'satuan_id' => $satuan[1],
            'jumlah' => 480,
        ]);

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[1],
            'satuan_id' => $satuan[0],
            'jumlah' => 120,
        ]);

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[1],
            'satuan_id' => $satuan[1],
            'jumlah' => 216,
        ]);

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[2],
            'satuan_id' => $satuan[0],
            'jumlah' => 410,
        ]);

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[2],
            'satuan_id' => $satuan[1],
            'jumlah' => 520,
        ]);

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[3],
            'satuan_id' => $satuan[0],
            'jumlah' => 8,
        ]);

        JumlahBarangMasuk::create([
            'barang_masuk_id' => $barang_masuk[3],
            'satuan_id' => $satuan[1],
            'jumlah' => 12,
        ]);
    }
}
