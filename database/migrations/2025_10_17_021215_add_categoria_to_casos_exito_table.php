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
        Schema::table('casos_exito', function (Blueprint $table) {
            // Usar TEXT para permitir múltiples categorías concatenadas (hasta 15 o más)
            // Nota: TEXT no soporta default en algunos drivers, por eso se omite
            $table->text('categoria')->nullable()->after('subtitulo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('casos_exito', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }
};
