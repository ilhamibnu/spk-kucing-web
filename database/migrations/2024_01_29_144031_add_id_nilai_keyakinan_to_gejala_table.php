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
        Schema::table('tb_gejala', function (Blueprint $table) {
            $table->unsignedBigInteger('id_nilai_keyakinan')->after('name');
            $table->foreign('id_nilai_keyakinan')->references('id')->on('tb_nilai_keyakinan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_gejala', function (Blueprint $table) {
            $table->dropForeign(['id_nilai_keyakinan']);
            $table->dropColumn(['id_nilai_keyakinan']);
        });
    }
};
