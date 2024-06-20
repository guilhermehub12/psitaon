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
        Schema::create('perfis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->string('descricao');
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->references('id')->on('usuarios')->onUpdate('cascade');
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
        Schema::dropIfExists('perfis');
    }
};
