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
        Schema::create('logo_mitras', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('urutan');
            $table->string('name');
            $table->text('logo');
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
        Schema::dropIfExists('logo_mitras');
    }
};
