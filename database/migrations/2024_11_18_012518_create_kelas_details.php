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
        Schema::create('kelas_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id');
            $table->string('judul_keterangan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->longText('metode_pembelajaran')->nullable();
            $table->string('durasi_pelatihan')->nullable();
            $table->string('fasilitator')->nullable();
            $table->string('img_fasilitator')->nullable();
            $table->longText('deskripsi_fasilitator')->nullable();
            $table->string('sertifikat_judul')->nullable();
            $table->string('sertifikat_judul_skkni')->default('Berdasarkan');
            $table->string('sertifikat_judul_kode_unit')->default('UNIT KOMPETENSI');
            $table->string('sertifikat_tenaga_pelatih')->nullable();
            $table->string('sertifikat_metode_satu')->nullable();
            $table->string('sertifikat_metode_dua')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_details');
    }
};
