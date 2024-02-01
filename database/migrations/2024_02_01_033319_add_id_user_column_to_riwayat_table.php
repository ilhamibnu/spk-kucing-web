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
            $table->unsignedBigInteger('user_id')->after('file_pdf');
            $table->foreign('user_id')->references('id')->on('tb_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_riwayat', function (Blueprint $table) {
            $table->dropForeign('tb_riwayat_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
