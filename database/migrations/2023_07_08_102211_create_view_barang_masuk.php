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
        CREATE OR REPLACE VIEW $viewName AS 
        SELECT bm.id, DATE_FORMAT(bm.tanggal, '%e %M %Y') AS 'tanggal', f.nama AS 'pemasok', jb.nama AS 'jenis_barang',
        GROUP_CONCAT(CONCAT(jbm.jumlah, ' ', s.nama) order by s.nama SEPARATOR ', ') AS 'jumlah'
        FROM barang_masuks bm
        JOIN figurs f ON bm.pemasok_id = f.id 
        JOIN jenis_barangs jb ON bm.jenis_barang_id = jb.id 
        JOIN jumlah_barang_masuks jbm ON jbm.barang_masuk_id = bm.id 
        JOIN satuans s ON jbm.satuan_id = s.id 
        GROUP BY bm.id, bm.tanggal, f.nama, jb.nama
        ORDER BY bm.tanggal DESC, bm.id
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
