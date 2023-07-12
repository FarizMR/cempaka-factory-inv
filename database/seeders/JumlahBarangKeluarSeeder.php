<?php

namespace Database\Seeders;

use App\Models\Satuan;
use App\Models\BarangKeluar;
use App\Models\JumlahBarangKeluar;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JumlahBarangKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang_keluar = BarangKeluar::all()->pluck('id')->toArray();
        $satuan = Satuan::all()->pluck('id')->toArray();

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[0],
            'satuan_id' => $satuan[0],
            'jumlah' => 378,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[0],
            'satuan_id' => $satuan[1],
            'jumlah' => 410,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[1],
            'satuan_id' => $satuan[0],
            'jumlah' => 39,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[1],
            'satuan_id' => $satuan[1],
            'jumlah' => 42,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[2],
            'satuan_id' => $satuan[0],
            'jumlah' => 39,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[2],
            'satuan_id' => $satuan[1],
            'jumlah' => 42,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[3],
            'satuan_id' => $satuan[0],
            'jumlah' => 39,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[3],
            'satuan_id' => $satuan[1],
            'jumlah' => 42,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[4],
            'satuan_id' => $satuan[0],
            'jumlah' => 39,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[4],
            'satuan_id' => $satuan[1],
            'jumlah' => 42,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[5],
            'satuan_id' => $satuan[0],
            'jumlah' => 39,
        ]);

        JumlahBarangKeluar::create([
            'barang_keluar_id' => $barang_keluar[5],
            'satuan_id' => $satuan[1],
            'jumlah' => 42,
        ]);
    }
}
