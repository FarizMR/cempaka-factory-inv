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
        CREATE OR REPLACE VIEW $viewName AS 
            SELECT bk.id, DATE_FORMAT(bk.tanggal, '%e %M %Y') AS 'tanggal', f.nama AS 'konsumen', jb.nama AS 'jenis_barang',
            IFNULL(GROUP_CONCAT(CONCAT(jbk.jumlah, ' ', s.nama) ORDER BY s.nama SEPARATOR ', '), '-') AS 'jumlah'
            FROM barang_keluars bk
            JOIN figurs f ON bk.konsumen_id = f.id 
            JOIN jenis_barangs jb ON bk.jenis_barang_id = jb.id 
            LEFT JOIN jumlah_barang_keluars jbk ON jbk.barang_keluar_id = bk.id 
            LEFT JOIN satuans s ON jbk.satuan_id = s.id 
            GROUP BY bk.id, bk.tanggal, f.nama, jb.nama
            ORDER BY bk.tanggal DESC, bk.id;";

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
