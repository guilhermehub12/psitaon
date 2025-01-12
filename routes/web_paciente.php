<?php

use Illuminate\Support\Facades\Route;

Route::prefix('paciente')->name('paciente.')->namespace('Paciente')->group(function () {
    // PACIENTES
    Route::resource('pacientes', 'PacienteController')
        ->parameters(['pacientes' => 'paciente']);

    // PACIENTES RESPONSAVEIS
    Route::resource('pacientes.responsaveis', 'PacienteResponsavelController')
        ->parameters([
            'pacientes' => 'paciente',
            'responsaveis' => 'pacienteResponsavel'
        ]);

    // PACIENTES PRONTUARIOS
    Route::resource('pacientes.prontuarios', 'Prontuario\PacienteProntuarioController')
        ->parameters([
            'pacientes' => 'paciente',
            'prontuarios' => 'pacienteProntuario'
        ]);

    // PACIENTES PRONTUARIOS QUEIXAS
    Route::resource('pacientes.prontuarios_queixas', 'Prontuario\PacienteProntuarioQueixaController')
        ->parameters([
            'pacientes' => 'paciente',
            'prontuariosQueixas' => 'pacienteProntuarioQueixa'
        ]);

    // PACIENTES AGENDA
    Route::resource('pacientes.agendas', 'PacienteAgendaController')
        ->parameters([
            'pacientes' => 'paciente',
            'agendas' => 'pacienteAgenda'
        ]);

    // PACIENTES FINANCEIRO
    Route::resource('pacientes.financeiros', 'PacienteFinanceiroController')
        ->parameters([
            'pacientes' => 'paciente',
            'financeiros' => 'pacienteFinanceiro'
        ]);

    // PACIENTES ENDEREÇO
    Route::resource('pacientes.enderecos', 'PacienteEnderecoController')
        ->parameters([
            'pacientes' => 'paciente',
            'enderecos' => 'pacienteEndereco'
        ]);
});
