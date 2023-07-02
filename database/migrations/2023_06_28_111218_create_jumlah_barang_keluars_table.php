<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumlah_barang_keluars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('barang_keluar_id');
            $table->integer('jumlah');
            $table->foreignUuid('satuan_id');
            $table->timestamps();

            $table->foreign('barang_keluar_id')->references('id')->on('barang_keluars')->cascadeOnDelete();
            $table->foreign('satuan_id')->references('id')->on('satuans')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jumlah_barang_keluars');
    }
}
