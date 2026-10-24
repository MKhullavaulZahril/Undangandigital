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
        Schema::create('ucapans', function (Blueprint $table) {
            $table->id();
            // Nama pengirim ucapan & doa
            $table->string('nama', 100);
            // Pesan ucapan maksimal 500 karakter
            $table->string('ucapan', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ucapans');
    }
};
