<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('katagori_id');
            $table->string('nama');
            $table->string('gambar');
            $table->text('deskripsi')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->foreign('katagori_id')->references('id')->on('barang_katagori')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
}