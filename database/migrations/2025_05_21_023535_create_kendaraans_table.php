<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supir_id')->constrained('supirs')->onDelete('cascade');
            $table->string('plat_nomor');
            $table->string('merk');
            $table->string('jenis');
            $table->integer('tahun');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
