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
        Schema::table('tb_detail_riwayat_gejala', function (Blueprint $table) {
            $table->unsignedBigInteger('id_gejala')->nullable();
            $table->foreign('id_gejala')->references('id')->on('tb_gejala');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_detail_riwayat_gejala', function (Blueprint $table) {
            $table->dropForeign(['id_gejala']);
            $table->dropColumn('id_gejala');
        });
    }
};
