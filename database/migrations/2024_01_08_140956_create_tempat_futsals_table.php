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
        Schema::create('tempat_futsals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nama_tempat');
            $table->string('fasilitas');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('status');
            $table->double('lng');
            $table->double('lat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_futsals');
    }
};
