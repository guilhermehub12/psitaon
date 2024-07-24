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
        Schema::create('modalidades_pagamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('modalidades_pagamentos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Convênio'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Particular'
                ]
            ]);
        });

        Schema::create('frequencias_pagamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('frequencias_pagamentos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Semanal'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Quinzenal'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Mensal'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Por Sessão'
                ]
            ]);
        });

        Schema::create('formas_pagamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('formas_pagamentos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Cartão de Crédito'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Cartão de Débito'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Boleto Bancário'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Transferência Bancária'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Pix'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Dinheiro'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Débito Automático'
                ]
            ]);
        });

        Schema::create('status_pagamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('status_pagamentos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Não pago'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Pago'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Em atraso'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Pago adiantado'
                ]
            ]);
        });

        Schema::create('status_presencas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('status_presencas')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Não presente'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Presente'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'A remarcar'
                ]
            ]);
        });

        Schema::create('pacientes_financeiro', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('paciente_id')->references('id')->on('pacientes')->onUpdate('cascade');

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
        Schema::dropIfExists('status_presencas');
        Schema::dropIfExists('status_pagamentos');
        Schema::dropIfExists('formas_pagamentos');
        Schema::dropIfExists('frequencias_pagamentos');
        Schema::dropIfExists('modalidades_pagamentos');
    }
};
