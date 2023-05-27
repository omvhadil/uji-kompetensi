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
        Schema::create('tabel_gaji', function (Blueprint $table) {
            $table->id('id_gaji');
            $table->string('nama_karyawan');
            $table->string('jabatan');
            $table->string('no_tlfn');
            $table->integer('gaji');
            $table->integer('tunjangan');
            $table->integer('total_gaji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_gaji');
    }
};