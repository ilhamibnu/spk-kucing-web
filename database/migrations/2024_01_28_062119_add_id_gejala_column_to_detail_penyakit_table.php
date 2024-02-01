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
        Schema::table('tb_detail_penyakit', function (Blueprint $table) {
            $table->unsignedBigInteger('gejala_id')->after('id');
            $table->foreign('gejala_id')->references('id')->on('tb_gejala');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_detail_penyakit', function (Blueprint $table) {
            $table->dropForeign('tb_detail_penyakit_gejala_id_foreign');
            $table->dropColumn('gejala_id');
        });
    }
};
