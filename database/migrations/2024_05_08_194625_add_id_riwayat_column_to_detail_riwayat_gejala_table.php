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
            $table->unsignedBigInteger('id_riwayat')->nullable();
            $table->foreign('id_riwayat')->references('id')->on('tb_riwayat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_riwayat_gejala', function (Blueprint $table) {
            $table->dropForeign(['id_riwayat']);
            $table->dropColumn('id_riwayat');
        });
    }
};
