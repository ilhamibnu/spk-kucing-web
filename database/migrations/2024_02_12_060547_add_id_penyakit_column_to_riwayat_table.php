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
        Schema::table('tb_riwayat', function (Blueprint $table) {
            $table->unsignedBigInteger('penyakit_id')->after('user_id');
            $table->foreign('penyakit_id')->references('id')->on('tb_penyakit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_riwayat', function (Blueprint $table) {
            $table->dropForeign(['penyakit_id']);
            $table->dropColumn('penyakit_id');
        });
    }
};
