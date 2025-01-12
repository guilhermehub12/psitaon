<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enquadramentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('enquadramentos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'PB-Apoio'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'PB-Processo'
                ]
            ]);
        });

        Schema::create('pacientes_prontuario_planejamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('paciente_prontuario_id')->references('id')->on('pacientes_prontuarios')->onUpdate('cascade');
            
            $table->foreignUuid('enquadramento_id')->references('id')->on('enquadramentos')->onUpdate('cascade');

            $table->longText('justificativa');
            $table->longText('situacao_problema');
            $table->longText('foco');
            $table->longText('pontos_urgencia');
            $table->longText('estrategias_planejadas');
            $table->longText('intervencoes_verbais');
            $table->longText('resolutividade');

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
        Schema::dropIfExists('pacientes_prontuario_planejamentos');
        Schema::dropIfExists('enquadramentos');
    }
};
