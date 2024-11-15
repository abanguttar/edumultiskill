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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->bigInteger('tipe_user')->comment('1 admin, 2 admin_guest, 3 tutor, 99 Superadmin');
            $table->string('foto')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('department')->nullable();
            $table->string('job_title')->nullable();
            $table->enum('is_active', [0, 1])->default(1)->comment('0 Tidak Aktif, 1 Aktif');
            $table->string('id_karyawan')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('deskripsi_diri')->nullable();
            $table->rememberToken();
            $table->bigInteger('user_create');
            $table->bigInteger('user_update')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
