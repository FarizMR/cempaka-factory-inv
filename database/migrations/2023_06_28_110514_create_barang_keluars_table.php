<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->dateTime('tanggal');
            $table->foreignUuid('konsumen_id');
            $table->foreignUuid('jenis_barang_id');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('konsumen_id')->references('id')->on('figurs');
            $table->foreign('jenis_barang_id')->references('id')->on('jenis_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluars');
    }
}
