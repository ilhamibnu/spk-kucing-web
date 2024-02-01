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
            $table->unsignedBigInteger('penyakit_id')->after('id');
            $table->foreign('penyakit_id')->references('id')->on('tb_penyakit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_detail_penyakit', function (Blueprint $table) {
            $table->dropForeign('tb_detail_penyakit_penyakit_id_foreign');
            $table->dropColumn('penyakit_id');
        });
    }
};
