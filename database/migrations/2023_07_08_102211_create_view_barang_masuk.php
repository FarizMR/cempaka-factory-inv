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
        $viewName = 'view_barang_masuk';
        $sql = "
        CREATE VIEW $viewName AS 
        select bm.id, bm.tanggal, f.nama as 'pemasok', jb.nama as 'jenis barang', jbm.jumlah, s.nama as 'satuan'
        from barang_masuks bm 
        join figurs f on bm.pemasok_id = f.id 
        join jenis_barangs jb on bm.jenis_barang_id = jb.id 
        join jumlah_barang_masuks jbm on jbm.barang_masuk_id = bm.id 
        join satuans s on jbm.satuan_id = s.id 
        order by bm.tanggal asc, bm.id 
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
        Schema::dropIfExists('view_barang_masuk');
    }
};
