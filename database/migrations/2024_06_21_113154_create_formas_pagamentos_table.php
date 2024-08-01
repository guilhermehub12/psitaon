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
        Schema::create('formas_pagamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formas_pagamentos');
    }
};
