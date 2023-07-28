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
        Schema::create('status_kamars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('status');
            $table->string('nama');
            $table->string('nohp');
            $table->bigInteger('id_kategori_transaksi');
            $table->integer('jumlahtamu');
            $table->string('statustamu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_kamars');
    }
};
