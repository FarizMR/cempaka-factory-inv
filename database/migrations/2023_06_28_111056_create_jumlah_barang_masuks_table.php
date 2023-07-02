<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahBarangMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumlah_barang_masuks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('barang_masuk_id');
            $table->integer('jumlah');
            $table->foreignUuid('satuan_id');
            $table->timestamps();

            $table->foreign('barang_masuk_id')->references('id')->on('barang_masuks')->cascadeOnDelete();
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
        Schema::dropIfExists('jumlah_barang_masuks');
    }
}
