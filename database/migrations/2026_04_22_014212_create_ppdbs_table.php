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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenjang');
            $table->string('jenis_kelamin');
            $table->text('alamat_lengkap');
            $table->string('no_wa_wali');
            $table->string('asal_sekolah');
            $table->string('wa_walikelas_asal_sekolah');
            $table->string('wa_operator_asal_sekolah');
            $table->text('alamat_asal_sekolah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
