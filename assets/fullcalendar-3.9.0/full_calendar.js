var initialize_calendar;
initialize_calendar = function(){
    $('.calendar').each(function(){
        var calendar = $(this);
        calendar.fullCalendar({
            header:{
                left: 'prev, next, Today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            selectable: true,
            selectHelper: true,
            editable: true,
            eventLimit:true

            select: function(start,end){
                $.getScript('/events/new', function(){
                    $('#event_date_range').val(moment(start).format("DD/MM/YYYY HH:mm")+ ' - '+ moment(end).format("DD/MM/YYYY HH:mm"))
                    date_range_picker();
                    $('.start_hidden').val(moment(start).format("DD/MM/YYYY HH:mm"));
                    $('.end_hidden').val(moment(start).format("DD/MM/YYYY HH:mm"));
                });
                calendar.fullCalendar('unselect');
            }
        });
    })
};
$(document).on('teste.php:load', initialize_calendar);