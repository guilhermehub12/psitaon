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
        Schema::create('status_pagamentos', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_pagamentos');
    }
};
