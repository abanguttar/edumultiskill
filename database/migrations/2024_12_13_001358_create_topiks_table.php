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
        Schema::create('topiks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id');
            $table->bigInteger('jadwal_id');
            $table->bigInteger('urutan');
            $table->string('nama_topik');
            $table->bigInteger('durasi')->default(0);
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
        Schema::dropIfExists('topiks');
    }
};
