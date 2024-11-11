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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->date('tanggal_monitoring');
            $table->string('nama_petugas');
            $table->string('latitude')->nullable();
            $table->string('longtitude')->nullable();
            $table->string('no_kk');
            $table->string('nama_kepala_keluarga');
            $table->text('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('jumlah_jiwa');
            $table->string('jumlah_jiwa_menetap');
            $table->string('desa_kelurahan');
            
            $table->string('pertanyaan_1_pilar_1');
            $table->string('pertanyaan_2_pilar_1');
            $table->string('pertanyaan_3_pilar_1');
            $table->string('pertanyaan_4_pilar_1');
            $table->string('pertanyaan_5_pilar_1');
            $table->string('pertanyaan_6_pilar_1');
            $table->string('pertanyaan_7_pilar_1');

            $table->string('pertanyaan_1_pilar_2');
            $table->string('pertanyaan_2_pilar_2');
            $table->string('pertanyaan_3_pilar_2');
            $table->string('pertanyaan_4_pilar_2');
            $table->string('pertanyaan_5_pilar_2');
            $table->string('pertanyaan_6_pilar_2');
            $table->string('pertanyaan_7_pilar_2');
            $table->string('pertanyaan_8_pilar_2');

            $table->string('pertanyaan_1_pilar_3');
            $table->string('pertanyaan_2_pilar_3');
            $table->string('pertanyaan_3_pilar_3');
            $table->string('pertanyaan_4_pilar_3');
            $table->string('pertanyaan_5_pilar_3');
            $table->string('pertanyaan_6_pilar_3');
            $table->string('pertanyaan_7_pilar_3');
            $table->string('pertanyaan_8_pilar_3');
            $table->string('pertanyaan_9_pilar_3');
            $table->string('pertanyaan_10_pilar_3');
            $table->string('pertanyaan_11_pilar_3');
            $table->string('pertanyaan_12_pilar_3');
            $table->string('pertanyaan_13_pilar_3');
            $table->string('pertanyaan_14_pilar_3');
            $table->string('pertanyaan_15_pilar_3');
            $table->string('pertanyaan_16_pilar_3');
            
            $table->string('pertanyaan_1_pilar_4');
            $table->string('pertanyaan_2_pilar_4');
            $table->string('pertanyaan_3_pilar_4');
            $table->string('pertanyaan_4_pilar_4');
            
            $table->string('pertanyaan_1_pilar_5');
            $table->string('pertanyaan_2_pilar_5');
            $table->string('pertanyaan_3_pilar_5');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
