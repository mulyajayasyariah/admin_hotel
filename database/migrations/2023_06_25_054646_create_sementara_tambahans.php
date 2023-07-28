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
        Schema::create('sementara_tambahans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaksi');
            $table->bigInteger('id_kategori');
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->integer('total');
            $table->bigInteger('id_hotel');
            $table->bigInteger('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sementara_tambahans.', function (Blueprint $table) {
            //
        });
    }
};
