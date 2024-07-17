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

        foreach (range(1, 50) as $index) {
            DB::table('pacientes')->insert([
                'id' => Str::uuid(),
                'nome' => $faker->name,
                'data_nascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'genero' => $faker->randomElement(['Masculino', 'Feminino', 'Outro']),
                'escolaridade' => $faker->randomElement(['Ensino Fundamental', 'Ensino Médio', 'Ensino Superior']),
                'profissao' => $faker->jobTitle,
                'estado_civil' => $faker->randomElement(['Solteiro', 'Casado', 'Divorciado', 'Viúvo']),
                'endereco' => $faker->address,
                'telefone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'nome_pai' => $faker->name('male'),
                'nome_mae' => $faker->name('female'),
                'ativo' => $faker->boolean
            ]);
        }
    }
}
