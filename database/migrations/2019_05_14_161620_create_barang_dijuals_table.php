<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangDijualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_dijuals', function (Blueprint $table) {
            $table->bigIncrements('id_barang');
            $table->integer('id_penjual');
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->integer('tipe');
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_dijuals');
    }
}
