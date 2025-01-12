<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Paciente;

class PacienteIntegrationTest extends TestCase
{
    // Usamos RefreshDatabase para garantir que o banco de dados de teste seja limpo entre os testes.
    // use RefreshDatabase;

    /**
     * Testa o fluxo de criação de um paciente.
     *
     * @return void
     */
    public function testPacienteCadastro(): void
    {
        $this->withoutMiddleware();

        // Dados a serem inseridos no bd
        $dadosPaciente = [
            'nome' => 'João Silva',
            'data_nascimento' => '1985-03-15',
            'profissao' => 'Engenheiro',
            'endereco' => 'Rua Exemplo, 123, São Paulo',
            'telefone' => '(11) 91234-5678',
            'email' => 'joao.silva@example.com',
            'nome_pai' => 'José Silva',
            'nome_mae' => 'Maria Silva',
            'genero_id' => '1',
            'escolaridade_id' => '2',
            'estado_civil_id' => '1'
        ];

        // Envia a requisição POST para a rota de cadastro do paciente
        $response = $this->post(route('paciente.pacientes.store'), $dadosPaciente);

        // Exibe a resposta da requisição para ajudar a identificar possíveis erros
        $response->dump();

        // Verifica se a resposta redireciona corretamente (status 302 indica sucesso no cadastro).
        $response->assertStatus(302);

        // Verifica se o paciente foi inserido no banco de dados com os dados corretos.
        $this->assertDatabaseHas('pacientes', [
            'nome' => 'João Silva',
            'email' => 'joao.silva@example.com',
        ]);
    }
}
