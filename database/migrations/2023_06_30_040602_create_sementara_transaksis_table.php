<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sementara_transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->date('booking');
            $table->date('checkin');
            $table->date('checkout');
            $table->bigInteger('id_nokamar');
            $table->string('nama');
            $table->string('statustamu');
            $table->bigInteger('id_kategori_transaksi');
            $table->bigInteger('id_kategori_kamar');
            $table->integer('jumlahtamu');
            $table->integer('hargakamar');
            $table->integer('deposit');
            $table->integer('diskon');
            $table->string('keterangan');
            $table->integer('total');
            $table->bigInteger('id_hotel');
            $table->bigInteger('iduser');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sementara_transaksis');
    }
};
