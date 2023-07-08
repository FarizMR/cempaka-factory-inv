<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $viewName = 'view_barang_keluar';
        $sql = "
        CREATE VIEW $viewName AS 
        select bk.id, bk.tanggal, f.nama as 'konsumen', jb.nama as 'jenis barang', jbk.jumlah, s.nama as 'satuan'
        from barang_keluars bk
        join figurs f on bk.konsumen_id = f.id 
        join jenis_barangs jb on bk.jenis_barang_id = jb.id 
        join jumlah_barang_keluars jbk on jbk.barang_keluar_id = bk.id 
        join satuans s on jbk.satuan_id = s.id 
        order by bk.tanggal asc, bk.id 
        ";

        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_barang_keluar');
    }
};
