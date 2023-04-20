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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->bigIncrements("ID_NOTA");
            $table->date("TGL")->nullable();
            $table->unsignedBigInteger('KODE_PELANGGAN')->index()->nullable();
            $table->foreign('KODE_PELANGGAN')->references('ID_PELANGGAN')->on('pelanggan')->onDelete('cascade');
            $table->integer('SUBTOTAL')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
