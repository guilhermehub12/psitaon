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
        Schema::create('frequencias_pagamentos', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequencias_pagamentos');
    }
};
