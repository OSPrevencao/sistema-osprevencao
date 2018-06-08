//-----------------FullCalendar-----------------------------------------
    
    $(document).on("click", "#add-calendar-event", function (e) {
        e.preventDefault();

        var eventInfo = {
            title: $("#nome-evento").val(),
            start: $("#data-evento").val(),
            end: $("#data-end-evento").val(),
            description: $("#descricao").val()
        }

        if (eventInfo.start == eventInfo.end || eventInfo.end == "") {
            eventInfo.allDay = true;
            delete eventInfo.end;
        }

        $.post("calendar-event.php", eventInfo, function (response, textStatus, xhr) {
            if (xhr.status != 201 ) {
                return;
            }
            eventInfo.allDay && delete eventInfo.allDay;
            $("#modal-adicionar-evento").modal('hide');

            eventInfo.start = moment(eventInfo.start);
            if (typeof eventInfo.end != "undefined") {
                eventInfo.end = moment(eventInfo.end);
            }

            $("#calendario").fullCalendar('renderEvent', eventInfo);

            $("#nome-evento").val("");
            $("#data-evento").val("");
            $("#data-end-evento").val("");
            $("#descricao").val("");
        });

    })

    // $("#add-calendar-event").click(function () {
    //     var self = $(this);
    //     var nomeEvento = $("#nome-evento").val();
    //     var dataEvento2 = moment($("#data-end-evento").val());
    //     var dataEvento = moment($("#data-evento").val());

    //     $("#calendario").fullCalendar('renderEvent', {
    //         title: nomeEvento,
    //         start: dataEvento,
    //         // end: dataEvento2,
    //         allDay: true,
    //     });

    //     $("#nome-evento").val('');
    //     $("#data-evento").val('');
    //     // $("#data-end-evento").val('');
    //     $("#modal-adicionar-evento").modal('hide');
    // });

    $("#calendario").fullCalendar({
        locale: 'pt',
        googleCalendarApiKey: calendarCredentials.api_key,
        events: [
            {
                googleCalendarId: calendarCredentials.calendar_address.obra,
                color: "yellow",
                backgroundColor: "yellow"
            },
            {
                googleCalendarId: calendarCredentials.calendar_address.visita,
                color: "blue",
                backgroundColor: "blue"
            }
        ],
        selectable: true,
        editable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        // select: function(startDate, endDate) {
        //     var title = prompt("Insira o nome do evento.");
        //     var start = prompt("Insira a data de inicio.");

        //     $("#calendario").fullCalendar('renderEvent', {
        //         title: 'teste 2',
        //         start: startDate,
        //         end: endDate
        //     });
        // },
    });

