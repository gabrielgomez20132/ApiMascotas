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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // Definir el campo user_id
            $table->string('nombre');
            $table->string('raza');
            $table->string('color');
            $table->text('descripcion');
            $table->string('foto')->nullable();
            $table->string('ubicacion_perdida');
            $table->boolean('encontrada')->default(false);

            // Relaciones FK con el formato que mencionaste
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('mascotas');
    }
};
