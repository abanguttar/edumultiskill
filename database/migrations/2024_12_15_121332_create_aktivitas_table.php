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
        Schema::create('aktivitas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id');
            $table->bigInteger('jadwal_id');
            $table->bigInteger('topik_id');
            $table->bigInteger('urutan');
            $table->string('nama_aktivitas');
            $table->bigInteger('durasi')->default(0);
            $table->bigInteger('bobot')->default(0);
            $table->bigInteger('is_locked')->default(0);
            $table->string('jenis')->comment("Jenis Bacaan, Video, Webinar, Evaluasi");
            $table->bigInteger('user_create');
            $table->bigInteger('user_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas');
    }
};
