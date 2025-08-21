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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hris_id')->comment('Dari Karyawan_id di HRIS');
            $table->string('nip');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('telepon')->nullable();
            $table->string('divisi');
            $table->string('sub_divisi');
            $table->text('cabang')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
