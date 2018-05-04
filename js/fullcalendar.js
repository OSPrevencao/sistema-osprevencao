//-----------------FullCalendar-----------------------------------------
    // $("#add-calendar-event").cli ck(function () {
        // var self = $(this);
        // var nomeEvento = $("#nome-evento").val();
        // var dataEvento2 = moment($("#data-evento2").val());
        // var dataEvento = moment($("#data-evento").val());

        // $("#calendario").fullCalendar('renderEvent', {
        //     title: nomeEvento,
        //     start: dataEvento,
        //     allDay: false,
        //     end: dataEvento2
        // });

        // $("#nome-evento").val('');
        // $("#data-evento").val('');
        // $("#data-evento2").val('');
        // $("#modal-adicionar-evento").modal('hide');
    // });

    $("#calendario").fullCalendar({
        locale: 'pt',
        googleCalendarApiKey: calendarCredentials.api_key,
        events: {
            googleCalendarId: calendarCredentials.calendar_address,
        },
        selectable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        select: function(startDate, endDate) {
            var title = prompt("Insira o nome do evento.");
            var start = prompt("Insira a data de inicio.");

            $("#calendario").fullCalendar('renderEvent', {
                title: 'teste 2',
                start: startDate,
                end: endDate
            });
        },
    });
    
