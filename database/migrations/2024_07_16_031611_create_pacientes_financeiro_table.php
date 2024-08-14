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
        Schema::create('pacientes_financeiro', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('paciente_id')->references('id')->on('pacientes')->onUpdate('cascade');
            $table->foreignUuid('paciente_agenda_id')->references('id')->on('pacientes_agenda')->onUpdate('cascade');

            $table->foreignUuid('modalidade_pagamento_id')->references('id')->on('modalidades_pagamentos')->onUpdate('cascade');

            $table->foreignUuid('frequencia_pagamento_id')->nullable()->references('id')->on('frequencias_pagamentos')->onUpdate('cascade');
            $table->foreignUuid('forma_pagamento_id')->nullable()->references('id')->on('formas_pagamentos')->onUpdate('cascade');
            $table->foreignUuid('status_pagamento_id')->nullable()->references('id')->on('status_pagamentos')->onUpdate('cascade');
            $table->foreignUuid('status_presenca_id')->nullable()->references('id')->on('status_presencas')->onUpdate('cascade');
            $table->string('valor_sessao')->nullable();

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
        Schema::dropIfExists('pacientes_financeiro');
    }
};
