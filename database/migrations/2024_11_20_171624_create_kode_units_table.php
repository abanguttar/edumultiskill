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
        Schema::create('kode_units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id');
            $table->string('kode_unit');
            $table->string('keterangan');

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
        Schema::dropIfExists('kode_units');
    }
};
