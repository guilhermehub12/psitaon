<style>
    .calendar {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 20px;
    }
    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .calendar-day, .calendar-week {
        flex: 1 0 14%;
        border: 1px solid #ddd;
        height: 120px;
        margin: 2px;
        padding: 5px;
        box-sizing: border-box;
    }
    .calendar-day h5, .calendar-week h5 {
        margin: 0;
        font-size: 16px;
        text-align: right;
    }
    .event {
        font-size: 12px;
        background-color: #f0f0f0;
        border-radius: 5px;
        padding: 2px;
        margin-top: 5px;
    }
    .day-names {
        display: flex;
        justify-content: space-between;
    }
    .day-name {
        flex: 1 0 14%;
        text-align: center;
        font-weight: bold;
    }
</style>

<div class="container" style="margin-block: 32px; background-color: #fff; padding: 16px; border-radius: 10px; box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);">
    <div class="calendar-header">
        <select id="year" class="form-control d-inline-block" style="width: 100px;"></select>
        <select id="month" class="form-control d-inline-block" style="width: 150px;"></select>
        <button id="today" class="btn btn-info">Hoje</button>
        <button id="loadCalendar" class="btn btn-primary">Carregar Calendário</button>
        <select id="view" class="form-control d-inline-block" style="width: 150px;">
            <option value="month">Mês</option>
            <option value="week">Semana</option>
            <option value="day">Dia</option>
        </select>
    </div>
    <div class="day-names" id="day-names"></div>
    <div class="calendar" id="calendar"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const currentYear = new Date().getFullYear();
        for (let year = currentYear - 5; year <= currentYear + 5; year++) {
            $('#year').append(new Option(year, year));
        }
        const monthNames = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
        monthNames.forEach((month, index) => {
            $('#month').append(new Option(month, index));
        });

        const dayNames = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"];
        dayNames.forEach(day => {
            $('#day-names').append('<div class="day-name">' + day + '</div>');
        });

        $('#loadCalendar').click(function() {
            const year = $('#year').val();
            const month = $('#month').val();
            const view = $('#view').val();
            loadCalendar(year, month, view);
        });

        $('#today').click(function() {
            const today = new Date();
            $('#year').val(today.getFullYear());
            $('#month').val(today.getMonth());
            loadCalendar(today.getFullYear(), today.getMonth(), 'month');
        });

        function loadCalendar(year, month, view) {
            $('#calendar').empty();
            $('#day-names').show();

            if (view === 'month') {
                loadMonthView(year, month);
            } else if (view === 'week') {
                loadWeekView(year, month);
            } else if (view === 'day') {
                loadDayView(year, month);
            }
        }

        function loadMonthView(year, month) {
            const firstDay = new Date(year, month).getDay();
            const daysInMonth = new Date(year, parseInt(month) + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                $('#calendar').append('<div class="calendar-day"></div>');
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dayDiv = $('<div class="calendar-day"></div>');
                dayDiv.append('<h5>' + day + '</h5>');

                const events = getEvents(year, month, day);
                events.forEach(event => {
                    dayDiv.append('<div class="event">' + event + '</div>');
                });

                $('#calendar').append(dayDiv);
            }
        }

        function loadWeekView(year, month) {
            $('#calendar').append('<div class="calendar-week">Semana</div>'); // Placeholder for actual week view implementation
        }

        function loadDayView(year, month) {
            $('#calendar').append('<div class="calendar-week">Dia</div>'); // Placeholder for actual day view implementation
        }

        function getEvents(year, month, day) {
            const events = {
                "2023-07-25": ["Evento 1", "Evento 2"],
                "2023-07-26": ["Evento 3"],
            };

            const dateString = `${year}-${String(parseInt(month) + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            return events[dateString] || [];
        }

        const now = new Date();
        $('#year').val(now.getFullYear());
        $('#month').val(now.getMonth());
        loadCalendar(now.getFullYear(), now.getMonth(), 'month');
    });
</script>
