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
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->string('id_booking');
            $table->date('booking');
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('nokamar');
            $table->string('id_kategori_transaksi');
            $table->string('nama');
            $table->string('nohp');
            $table->integer('subtotal');
            $table->integer('diskon');
            $table->integer('total');
            $table->integer('dp');
            $table->integer('harusdibayar');
            $table->bigInteger('metodebayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
