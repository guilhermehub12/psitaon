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
        Schema::create('tipos_responsavel', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('codigo')->unique();
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('created_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('usuarios')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        // DB::table('tipos_responsavel')->insert(
        //     [
        //     'id' => Str::orderedUuid(),
        //     'nome' => 'Financeiro',
        //     'descricao' => 'Quem irá cuidar da minha parte financeira das consultas',
        //     'created_by' => null,
        //     'updated_by' => null,
        //     'deleted_by' => null,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //     'id' => Str::orderedUuid(),
        //     'nome' => 'Cuidador',
        //     'descricao' => 'Cuidador',
        //     'created_by' => null,
        //     'updated_by' => null,
        //     'deleted_by' => null,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //     'id' => Str::orderedUuid(),
        //     'nome' => 'Família',
        //     'descricao' => 'Família',
        //     'created_by' => null,
        //     'updated_by' => null,
        //     'deleted_by' => null,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //     'id' => Str::orderedUuid(),
        //     'nome' => 'Amigos',
        //     'descricao' => 'Amigos',
        //     'created_by' => null,
        //     'updated_by' => null,
        //     'deleted_by' => null,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //     'id' => Str::orderedUuid(),
        //     'nome' => 'Grupos',
        //     'descricao' => 'Grupos',
        //     'created_by' => null,
        //     'updated_by' => null,
        //     'deleted_by' => null,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //     'id' => Str::orderedUuid(),
        //     'nome' => 'Mora com',
        //     'descricao' => 'Mora com',
        //     'created_by' => null,
        //     'updated_by' => null,
        //     'deleted_by' => null,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //     'id' => Str::orderedUuid(),
        //     'nome' => 'Dependentes',
        //     'descricao' => 'Dependentes',
        //     'created_by' => null,
        //     'updated_by' => null,
        //     'deleted_by' => null,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        //     ],
        // );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_responsavel');
    }
};
