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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_kategori_id');
            $table->string('judul_kelas');
            $table->string('slug');
            $table->bigInteger('program')->comment('0 untuk general 1 untuk prakerja 2 untuk isw 3 untuk program tokutei gino');
            $table->bigInteger('is_dudika')->nullable()->comment('0 untuk general 1 untuk prakerja 2 untuk isw 3 untuk program tokutei gino');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('course_code')->nullable();
            $table->integer('status_kelas')->comment('1 artinya Rencana, 2 = kurasi, 3 = aktif pendaftaran, 4 = aktif belajar, 5 = tutup pendaftaran, 0 = arsip')->default(1);
            $table->string('jenis')->comment('prakerja atau umum');
            $table->bigInteger('partner_id')->comment('Partner')->default(0);
            $table->string('metode_pelatihan')->comment('Luring / Webinar / Self Paced Learning / Video Learning');
            $table->string('level');
            $table->string('okupasi')->nullable()->comment('Tag okupasi');
            $table->string('jenjang_pendidikan')->comment('SD s/d S2');
            $table->enum('unggulan', [0, 1])->default(0);
            $table->enum('best_seller', [0, 1])->comment('0 artinya tidak popular')->default(0);
            $table->string('tag_kelas')->nullable()->comment('Tag kelas');
            $table->bigInteger('harga_reguler');
            $table->bigInteger('harga_discount')->default(0);
            $table->enum('is_discount', [0, 1])->default(0);
            $table->enum('approval_free', [0, 1])->nullable();
            $table->enum('voucher_use', [0, 1])->nullable();
            $table->bigInteger('tutor_id')->nullable()->comment('Table user dengan tipe user 3');
            $table->bigInteger('tutor_penilai_satu')->nullable()->comment('Table user dengan tipe user 3');
            $table->bigInteger('tutor_penilai_dua')->nullable()->comment('Table user dengan tipe user 3');
            $table->string('tutor_profesi')->nullable();
            $table->bigInteger('user_create')->nullable();
            $table->bigInteger('user_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
