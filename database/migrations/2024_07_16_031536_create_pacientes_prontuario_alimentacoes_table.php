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
        Schema::create('pacientes_prontuario_alimentacoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('paciente_prontuario_id')->references('id')->on('pacientes_prontuario')->onUpdate('cascade');
            $table->text('comer');
            $table->text('dormir');
            $table->text('disturbios');
            $table->text('inicio');
            $table->text('acompanhante');

            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes_prontuario_alimentacoes');
    }
};
