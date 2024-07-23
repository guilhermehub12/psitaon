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
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('tipos_crises')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Crise acidental ou inesperada'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Crise evolutiva ou de desenvolvimento'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Crise por perda'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Crise por aquisição'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Nenhuma'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Outras'
                ],
            ]);
        });

        Schema::create('sentimentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('sentimentos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Tristeza'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Culpa'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Baixa estima'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Raiva'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Inferioridade'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Insegurança'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Inadequadação'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Mágoa'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Outros'
                ],
            ]);
        });

        Schema::create('riscos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('riscos')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Auto agressão'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Depressão melancólica'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Adoecimento'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Transtorno'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Projeção de culpa'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Suicídio'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Admitir mais do que pode'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Fuga'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Outros'
                ],
            ]);
        });

        Schema::create('areas_afetadas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->timestamps();
        });

        DB::transaction(function () {
            DB::table('areas_afetadas')->insert([
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Afetividade'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Sexualidade'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Relacionamento parental'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Relacionamento afetivo/conjugal'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Relacionamento filial'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Relacionamento social'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Organização financeira'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Convivência doméstica'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Profissional'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Físico'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Produtivo'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nome' => 'Lazer'
                ],
                [
                    'id' => Str::orderedUuid(),
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
