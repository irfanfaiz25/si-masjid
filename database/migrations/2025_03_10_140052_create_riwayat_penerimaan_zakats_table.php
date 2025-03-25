<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_penerimaan_zakats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penerima_zakat_id');
            $table->decimal('jumlah', 10, 2);
            $table->year('tahun');
            $table->string('status');
            $table->timestamps();

            $table->foreign('penerima_zakat_id')->references('id')->on('penerima_zakats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penerimaan_zakats');
    }
};
