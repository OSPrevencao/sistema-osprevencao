// $(function () {
// 	$("#calendar").fullCalendar({});
// })

function validarCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

(function () {
    // alert('funciona');
    //Evento de sumir da listagem de produtos
    $("#produto_proprio").on("change", function () {
        $("#lista_produtos").toggle('slow');
    });

    //validação de cnpj no cadastro de clientes
    $("#cnpj").on("change", function () {
        var self = $(this);
        var cnpj = self.val();
        if (cnpj == "" || !validarCNPJ(cnpj)) {
            self.val('');
            alert("CNPJ inválido.");        
            return;
        }
        $.get("valida_cnpj.php", {cnpj: cnpj}, function (response) {
            var data = response;
            if (data.status != "sucesso") {
                self.val('');

                alert("CNPJ já cadastrado.");
                return;
            }
        }, "json");
    });


    //fullcalendar
    // $("#calendario").fullCalendar({
    //     locale: 'pt',
    //     eventSources: [
    //         {
    //           url: 'calendar-events.php',
    //           // color: 'yellow', 
    //           textColor: 'white',
    //         }
    //     ],
    // });

    $("#add-calendar-event").click(function () {
        var self = $(this);
        var nomeEvento = $("#nome-evento").val();
        var dataEvento = moment($("#data-evento").val());

        $("#calendario").fullCalendar('renderEvent', {
            title: nomeEvento,
            start: dataEvento,
            allDay: true
        });

        $("#nome-evento").val('');
        $("#data-evento").val('');
        $("#modal-adicionar-evento").modal('hide');
    });

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
            var title = prompt("Insira o nome do evento.",)
            $("#calendario").fullCalendar('renderEvent', {
                title: 'teste 2',
                start: startDate,
                end: endDate
            });
        }
    });


    $("#relatorio").on("click", function () {
        window.print();
    });
})()
