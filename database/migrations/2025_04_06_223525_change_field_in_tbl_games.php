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
        Schema::table('tbl_games', function (Blueprint $table) {
            $table->dropColumn('genero');
            $table->unsignedBigInteger('genero_id')->after('nome');
            $table->foreign('genero_id')->references('id')->on('tbl_genero_games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_games', function (Blueprint $table) {
            $table->dropForeign(['genero_id']);
            $table->dropColumn('genero_id');
            $table->string('genero', 255)->after('nome');
        });
    }
};
