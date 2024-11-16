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
        Schema::create('kelas_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 25);
            $table->string('icon_kategori');
            $table->unsignedBigInteger('update_by')->nullable();
            $table->timestamp('updated_date')->nullable();
            
            // Add foreign key for update_by if you have users table
            $table->foreign('update_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_kategori');
    }
};
