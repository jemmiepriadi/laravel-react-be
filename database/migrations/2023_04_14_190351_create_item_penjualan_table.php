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
        Schema::create('item_penjualan', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('NOTA')->unsigned()->index()->nullable();
            $table->bigInteger('KODE_BARANG')->unsigned()->index()->nullable();
            $table->foreign('NOTA')->references('ID_NOTA')->on('penjualan')->onDelete('cascade');
            $table->foreign('KODE_BARANG')->references('KODE')->on('barang')->onDelete('cascade');
            $table->integer('QTY')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_penjualan');
    }
};
