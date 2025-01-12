<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('generos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::transaction(function () {
            DB::table('generos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 1,
                    'nome' => 'Masculino'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 2,
                    'nome' => 'Feminino'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 3,
                    'nome' => 'Não Binário'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 4,
                    'nome' => 'Outro'
                ],
            ]);
        });

        Schema::create('escolaridades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::transaction(function () {
            DB::table('escolaridades')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 1,
                    'nome' => 'Ensino Fundamental Incompleto',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 2,
                    'nome' => 'Ensino Fundamental Completo',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 3,
                    'nome' => 'Ensino Médio Incompleto',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 4,
                    'nome' => 'Ensino Médio Completo',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 5,
                    'nome' => 'Ensino Superior Incompleto',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 6,
                    'nome' => 'Ensino Superior Completo',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 7,
                    'nome' => 'Pós-graduação',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 8,
                    'nome' => 'Mestrado',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 9,
                    'nome' => 'Doutorado',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 10,
                    'nome' => 'Outro',
                ],
            ]);
        });

        Schema::create('estados_civis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        // Inserir dados na tabela
        DB::transaction(function () {
            DB::table('estados_civis')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 1,
                    'nome' => 'Solteiro(a)',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 2,
                    'nome' => 'Casado(a)',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 3,
                    'nome' => 'Divorciado(a)',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 4,
                    'nome' => 'Viúvo(a)',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 5,
                    'nome' => 'Separado(a)',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 6,
                    'nome' => 'União Estável',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 7,
                    'nome' => 'Outro',
                ],
            ]);
        });

        Schema::create('pacientes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->string('data_nascimento');
            $table->string('profissao');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email');
            $table->string('nome_pai');
            $table->string('nome_mae');

            $table->foreignUuid('genero_id')->references('id')->on('generos')->onUpdate('cascade');
            $table->foreignUuid('escolaridade_id')->references('id')->on('escolaridades')->onUpdate('cascade');
            $table->foreignUuid('estado_civil_id')->references('id')->on('estados_civis')->onUpdate('cascade');

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
        Schema::dropIfExists('generos');
        Schema::dropIfExists('escolaridades');
        Schema::dropIfExists('estados_civis');
        Schema::dropIfExists('pacientes');
    }
};
