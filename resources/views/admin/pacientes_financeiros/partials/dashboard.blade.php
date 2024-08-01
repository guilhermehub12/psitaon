    <style>
        .container {
            margin-top: 20px;
        }

        .chart-container {
            position: relative;
            height: 650px;
            width: 100%;
        }

        .table-container {
            margin-top: 20px;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card {
            flex: 1;
            padding: 20px;
            margin: 5px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            text-align: center;
        }

        .card h3 {
            margin: 10px 0;
        }

        .card p {
            font-size: 18px;
            margin: 5px 0;
        }
    </style>
    <div class="container">
        <div class="card-container">
            <div class="card" id="totalRevenueCard">
                <h5>Total</h5>
                <p id="totalRevenue">R$0</p>
            </div>
            <div class="card" id="highestMonthCard">
                <h5>Mês com Maior Valor</h5>
                <p id="highestMonth">Nenhum</p>
            </div>
            <div class="card" id="highestValueCard">
                <h5>Maior Valor do Mês</h5>
                <p id="highestValue">R$0</p>
            </div>
            <div class="card" id="totalPatientsCard">
                <h5>Total de Pacientes</h5>
                <p id="totalPatients">103</p>
            </div>
        </div>

        <div class="chart-container"
            style="margin-block: 32px; background-color: #fff; padding: 16px; border-radius: 10px; box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);">
            <h2>Desempenho Financeiro das Sessões</h2>
            <canvas id="financialChart"></canvas>
        </div>

        <div class="table-container"
            style="margin-block: 32px; background-color: #fff; padding: 16px; border-radius: 10px; box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);">
            <h2>Detalhes dos Pacientes</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome do Paciente</th>
                        <th>Valor da Sessão</th>
                        <th>Status de Presença</th>
                        <th>Status de Pagamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="patientDetails">
                    <!-- Os detalhes dos pacientes serão inseridos aqui via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // Dados de exemplo para o gráfico e a tabela
            const financialData = {
                currentYear: {
                    label: "2024",
                    data: [1000, 1200, 900, 1400, 1500, 1300, 1100, 1600, 1700, 1800, 1900, 2000]
                },
                previousYear: {
                    label: "2023",
                    data: [900, 1100, 800, 1300, 1400, 1200, 1000, 1500, 1600, 1700, 1800, 1900]
                }
            };

            const patientDetails = [{
                    name: "João Silva",
                    value: "R$100",
                    presenceStatus: "Presente",
                    paymentStatus: "Pago",
                    actions: `
                        <button
                            type="button"
                            class="btn btn-info text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-pen"></i> Editar
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-trash"></i> Deletar
                        </button>`
                },
                {
                    name: "Maria Santos",
                    value: "R$150",
                    presenceStatus: "Ausente",
                    paymentStatus: "Pendente",
                    actions: `
                        <button
                            type="button"
                            class="btn btn-info text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-pen"></i> Editar
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-trash"></i> Deletar
                        </button>`
                },
                {
                    name: "Pedro Oliveira",
                    value: "R$200",
                    presenceStatus: "Presente",
                    paymentStatus: "Pago",
                    actions: `
                        <button
                            type="button"
                            class="btn btn-info text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-pen"></i> Editar
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-trash"></i> Deletar
                        </button>`
                },
                {
                    name: "Ana Pereira",
                    value: "R$120",
                    presenceStatus: "Presente",
                    paymentStatus: "Pendente",
                    actions: `
                        <button
                            type="button"
                            class="btn btn-info text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-pen"></i> Editar
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger text-uppercase font-weight-bold"
                            data-toggle="modal"
                            data-target="#"
                        >
                            <i class="fas fa-trash"></i> Deletar
                        </button>`
                }
            ];

            // Função para criar o gráfico
            function createFinancialChart(data) {
                const ctx = document.getElementById('financialChart').getContext('2d');
                const financialChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out',
                            'Nov', 'Dez'
                        ],
                        datasets: [{
                                label: data.currentYear.label,
                                data: data.currentYear.data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            },
                            {
                                label: data.previousYear.label,
                                data: data.previousYear.data,
                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Função para preencher a tabela com os detalhes dos pacientes
            function populatePatientDetails(details) {
                const tbody = $('#patientDetails');
                details.forEach(detail => {
                    const row = `<tr>
                        <td>${detail.name}</td>
                        <td>${detail.value}</td>
                        <td>${detail.presenceStatus}</td>
                        <td>${detail.paymentStatus}</td>
                        <td>${detail.actions}</td>
                    </tr>`;
                    tbody.append(row);
                });
            }

            // Função para calcular e preencher os dados dos cards
            function populateCards(data, details) {
                const totalRevenue = data.currentYear.data.reduce((sum, value) => sum + value, 0);
                const highestValue = Math.max(...data.currentYear.data);
                const highestMonthIndex = data.currentYear.data.indexOf(highestValue);
                const highestMonth = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov',
                    'Dez'
                ][highestMonthIndex];
                // const totalPatients = details.length;
                const totalPatients = 128;

                $('#totalRevenue').text(`R$${totalRevenue}`);
                $('#highestValue').text(`R$${highestValue}`);
                $('#highestMonth').text(highestMonth);
                $('#totalPatients').text(totalPatients);
            }

            // Criar o gráfico e preencher a tabela e os cards com os dados de exemplo
            createFinancialChart(financialData);
            populatePatientDetails(patientDetails);
            populateCards(financialData, patientDetails);
        });
    </script>
