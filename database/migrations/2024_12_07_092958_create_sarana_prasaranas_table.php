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
        Schema::create('sarana_prasaranas', function (Blueprint $table) {
            $table->id();
            $table->string('group')->nullable();
            $table->string('name');
            $table->string('condition');
            $table->string('qty');
            $table->string('status');
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
        Schema::dropIfExists('sarana_prasaranas');
    }
};
