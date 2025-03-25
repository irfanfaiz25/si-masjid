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
        Schema::create('riwayat_pemberian_zakats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemberi_zakat_id');
            $table->decimal('jumlah', 10, 2);
            $table->year('tahun');
            $table->timestamps();

            $table->foreign('pemberi_zakat_id')->references('id')->on('pemberi_zakats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pemberian_zakats');
    }
};
