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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // Campo FK user_id
            $table->unsignedBigInteger('mascota_id'); // Campo FK mascota_id
            $table->text('descripcion');
            $table->decimal('recompensa', 10, 2);
            $table->decimal('porcentaje_app', 10, 2);

            // Definición de claves foráneas
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('mascota_id')
                ->references('id')
                ->on('mascotas')
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
        Schema::dropIfExists('reportes');
    }
};
