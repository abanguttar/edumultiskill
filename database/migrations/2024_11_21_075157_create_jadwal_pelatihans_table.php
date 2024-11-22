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
        Schema::create('jadwal_pelatihans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id');
            $table->string('judul_jadwal_pelatihan');
            $table->string('schedule_code')->unique();

            $table->enum('status', ['aktif', 'tidak aktif'])->default('tidak aktif');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai'); 
            $table->string('waktu_pelaksanaan');
            $table->integer('kuota')->default('0');
            $table->enum('diarsipkan', ['1', '0'])->default('0');
            $table->BigInteger('update_by')->nullable();
            $table->BigInteger('create_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelatihans');
    }
};
