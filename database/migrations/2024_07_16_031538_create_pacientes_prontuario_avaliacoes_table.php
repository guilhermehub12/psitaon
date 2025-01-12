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
        Schema::create('tipos_crises', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::transaction(function () {
            DB::table('tipos_crises')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 1,
                    'nome' => 'Crise acidental ou inesperada'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 2,
                    'nome' => 'Crise evolutiva ou de desenvolvimento'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 3,
                    'nome' => 'Crise por perda'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 4,
                    'nome' => 'Crise por aquisição'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 5,
                    'nome' => 'Nenhuma'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 6,
                    'nome' => 'Outras'
                ],
            ]);
        });


        Schema::create('sentimentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::transaction(function () {
            DB::table('sentimentos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 1,
                    'nome' => 'Tristeza'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 2,
                    'nome' => 'Culpa'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 3,
                    'nome' => 'Baixa estima'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 4,
                    'nome' => 'Raiva'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 5,
                    'nome' => 'Inferioridade'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 6,
                    'nome' => 'Insegurança'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 7,
                    'nome' => 'Inadequadação'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 8,
                    'nome' => 'Mágoa'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 9,
                    'nome' => 'Outros'
                ],
            ]);
        });


        Schema::create('riscos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::transaction(function () {
            DB::table('riscos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 1,
                    'nome' => 'Auto agressão'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 2,
                    'nome' => 'Depressão melancólica'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 3,
                    'nome' => 'Adoecimento'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 4,
                    'nome' => 'Transtorno'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 5,
                    'nome' => 'Projeção de culpa'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 6,
                    'nome' => 'Suicídio'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 7,
                    'nome' => 'Admitir mais do que pode'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 8,
                    'nome' => 'Fuga'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 9,
                    'nome' => 'Outros'
                ],
            ]);
        });


        Schema::create('areas_afetadas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::transaction(function () {
            DB::table('areas_afetadas')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 1,
                    'nome' => 'Afetividade'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 2,
                    'nome' => 'Sexualidade'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 3,
                    'nome' => 'Relacionamento parental'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 4,
                    'nome' => 'Relacionamento afetivo/conjugal'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 5,
                    'nome' => 'Relacionamento filial'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 6,
                    'nome' => 'Relacionamento social'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 7,
                    'nome' => 'Organização financeira'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 8,
                    'nome' => 'Convivência doméstica'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 9,
                    'nome' => 'Profissional'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 10,
                    'nome' => 'Físico'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 11,
                    'nome' => 'Produtivo'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 12,
                    'nome' => 'Lazer'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'codigo' => 13,
                    'nome' => 'Outros'
                ],
            ]);
        });


        Schema::create('pacientes_prontuario_avaliacoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('paciente_prontuario_id')->references('id')->on('pacientes_prontuarios')->onUpdate('cascade');
            $table->text('situacao');

            $table->foreignUuid('tipo_crise_id')->references('id')->on('tipos_crises')->onUpdate('cascade');
            $table->string('tipo_crise_descricao')->nullable();

            $table->foreignUuid('sentimento_id')->references('id')->on('sentimentos')->onUpdate('cascade');
            $table->string('sentimento_descricao')->nullable();

            $table->foreignUuid('risco_id')->references('id')->on('riscos')->onUpdate('cascade');
            $table->string('risco_descricao')->nullable();

            $table->foreignUuid('area_afetada_id')->references('id')->on('areas_afetadas')->onUpdate('cascade');
            $table->string('area_afetada_descricao')->nullable();

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
        Schema::dropIfExists('pacientes_prontuario_avaliacoes');
        Schema::dropIfExists('tipos_crises');
        Schema::dropIfExists('sentimentos');
        Schema::dropIfExists('riscos');
        Schema::dropIfExists('areas_afetadas');
    }
};
