<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Obtendo os IDs das tabelas relacionadas
        $generoIds = DB::table('generos')->pluck('id', 'nome')->toArray();
        $escolaridadeIds = DB::table('escolaridades')->pluck('id', 'nome')->toArray();
        $estadoCivilIds = DB::table('estados_civis')->pluck('id', 'nome')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('pacientes')->insert([
                'id' => Str::uuid(),
                'nome' => $faker->name,
                'data_nascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'profissao' => $faker->jobTitle,
                'endereco' => $faker->address,
                'telefone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'nome_pai' => $faker->name('male'),
                'nome_mae' => $faker->name('female'),
                'ativo' => $faker->boolean,
                'genero_id' => $faker->randomElement(array_values($generoIds)),
                'escolaridade_id' => $faker->randomElement(array_values($escolaridadeIds)),
                'estado_civil_id' => $faker->randomElement(array_values($estadoCivilIds))
            ]);
        }
    }
}
