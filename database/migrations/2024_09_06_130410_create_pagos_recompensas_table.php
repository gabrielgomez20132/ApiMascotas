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
        Schema::create('pagos_recompensas', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // Campo FK user_id
            $table->unsignedBigInteger('reporte_id'); // Campo FK reporte_id
            $table->decimal('monto_total', 10, 2);
            $table->decimal('monto_recompensa', 10, 2);
            $table->decimal('monto_app', 10, 2);

            // Claves foráneas
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('reporte_id')
                ->references('id')
                ->on('reportes')
                ->onDelete('cascade');

            // Timestamps y soft delete
            $table->timestamps(); // created_at y updated_at
            $table->softDeletes(); // deleted_at para soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_recompensas');
    }
};
