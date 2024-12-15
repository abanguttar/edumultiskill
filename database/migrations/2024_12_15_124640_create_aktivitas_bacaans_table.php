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
        Schema::create('aktivitas_bacaans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id');
            $table->bigInteger('jadwal_id');
            $table->bigInteger('topik_id');
            $table->bigInteger('aktivitas_id');
            $table->text('file')->nullable();
            $table->longText('intruksi')->nullable();
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
        Schema::dropIfExists('aktivitas_bacaans');
    }
};
