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
        Schema::table('forms', function (Blueprint $table) {
            $table->string('dusun_posyandu')->nullable();
            $table->integer('pertanyaan_phbs_1')->nullable();
            $table->integer('pertanyaan_phbs_2')->nullable();
            $table->integer('pertanyaan_phbs_3')->nullable();
            $table->integer('pertanyaan_phbs_4')->nullable();
            $table->integer('pertanyaan_phbs_5')->nullable();
            $table->integer('pertanyaan_phbs_6')->nullable();
            $table->integer('pertanyaan_phbs_7')->nullable();
            $table->integer('pertanyaan_phbs_8')->nullable();
            $table->integer('pertanyaan_phbs_9')->nullable();
            $table->integer('pertanyaan_phbs_10')->nullable();
            $table->integer('pertanyaan_phbs_11')->nullable();
            $table->integer('pertanyaan_phbs_12')->nullable();
            $table->integer('pertanyaan_phbs_13')->nullable();
            $table->integer('pertanyaan_phbs_14')->nullable();
            $table->integer('pertanyaan_phbs_15')->nullable();
            $table->integer('pertanyaan_phbs_16')->nullable();
            $table->integer('pertanyaan_phbs_17')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->string('dusun_posyandu');
            $table->dropColumn('pertanyaan_phbs_1');
            $table->dropColumn('pertanyaan_phbs_2');
            $table->dropColumn('pertanyaan_phbs_3');
            $table->dropColumn('pertanyaan_phbs_4');
            $table->dropColumn('pertanyaan_phbs_5');
            $table->dropColumn('pertanyaan_phbs_6');
            $table->dropColumn('pertanyaan_phbs_7');
            $table->dropColumn('pertanyaan_phbs_8');
            $table->dropColumn('pertanyaan_phbs_9');
            $table->dropColumn('pertanyaan_phbs_10');
            $table->dropColumn('pertanyaan_phbs_11');
            $table->dropColumn('pertanyaan_phbs_12');
            $table->dropColumn('pertanyaan_phbs_13');
            $table->dropColumn('pertanyaan_phbs_14');
            $table->dropColumn('pertanyaan_phbs_15');
            $table->dropColumn('pertanyaan_phbs_16');
            $table->dropColumn('pertanyaan_phbs_17');
        });
    }
};
