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
            $table->string('email'); // ✅ TAMBAHAN
            $table->string('asal_sekolah');
            $table->string('nisn');
            $table->string('nik');
            $table->string('kk');
            $table->string('no_hp');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat_lengkap');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_hp_ortu');
            $table->string('tahun_masuk');
            $table->string('pekerjaan_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_ibu');
            $table->string('penghasilan_ortu');
            $table->string('kelas');
            $table->string('pernah_tk');
            $table->string('pernah_paud');
            $table->string('hobi');
            $table->string('anak_ke');
            $table->string('jumlah_saudara');
            $table->string('cita_cita');
            $table->string('file_ijazah');
            $table->string('file_akte');
            $table->string('file_kartu');
            $table->string('file_ktp_ortu');
            $table->string('file_kk');
            $table->string('foto');

            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending'); // ✅ TAMBAHAN
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
