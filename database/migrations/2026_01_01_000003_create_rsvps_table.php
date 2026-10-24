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
        Schema::create('rsvps', function (Blueprint $table) {
            $table->id();
            // Nama tamu maksimal 100 karakter
            $table->string('nama', 100);
            // Status konfirmasi kehadiran: hadir atau tidak_hadir
            $table->enum('status', ['hadir', 'tidak_hadir']);
            // Jumlah tamu yang hadir, default 1 orang
            $table->unsignedTinyInteger('jumlah')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rsvps');
    }
};
