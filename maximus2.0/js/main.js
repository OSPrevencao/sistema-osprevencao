// $(function () {
// 	$("#calendar").fullCalendar({});
// })
// 
// Client ID and API key from the Developer Console
var CLIENT_ID = calendarClientId;
var API_KEY = calendarCredentials.api_key;

// Array of API discovery doc URLs for APIs used by the quickstart
var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

// Authorization scopes required by the API; multiple scopes can be
// included, separated by spaces.
var SCOPES = "https://www.googleapis.com/auth/calendar.readonly";

var authorizeButton = document.getElementById('authorize-button');
var signoutButton = document.getElementById('signout-button');

/**
*  On load, called to load the auth2 library and API client library.
*/
function handleClientLoad() {
    gapi.load('client:auth2', initClient);
}

/**
*  Initializes the API client library and sets up sign-in state
*  listeners.
*/
function initClient() {
    gapi.client.init({
        apiKey: API_KEY,
        clientId: CLIENT_ID,
        discoveryDocs: DISCOVERY_DOCS,
        scope: SCOPES
    }).then(function () {
        // Listen for sign-in state changes.
        gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

        // Handle the initial sign-in state.
        updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
        authorizeButton.onclick = handleAuthClick;
        signoutButton.onclick = handleSignoutClick;
    });
}

/**
*  Called when the signed in status changes, to update the UI
*  appropriately. After a sign-in, the API is called.
*/
function updateSigninStatus(isSignedIn) {
    if (isSignedIn) {
        authorizeButton.style.display = 'none';
        signoutButton.style.display = 'block';
        listUpcomingEvents();
    } else {
        authorizeButton.style.display = 'block';
        signoutButton.style.display = 'none';
    }
}

/**
*  Sign in the user upon button click.
*/
function handleAuthClick(event) {
    gapi.auth2.getAuthInstance().signIn();
}

/**
*  Sign out the user upon button click.
*/
function handleSignoutClick(event) {
    gapi.auth2.getAuthInstance().signOut();
}

/**
* Append a pre element to the body containing the given message
* as its text node. Used to display the results of the API call.
*
* @param {string} message Text to be placed in pre element.
*/
function appendPre(message) {
    var pre = document.getElementById('content');
    var textContent = document.createTextNode(message + '\n');
    pre.appendChild(textContent);
}

/**
* Print the summary and start datetime/date of the next ten events in
* the authorized user's calendar. If no events are found an
* appropriate message is printed.
*/
function listUpcomingEvents() {
    gapi.client.calendar.events.list({
        'calendarId': 'primary',
        'timeMin': (new Date()).toISOString(),
        'showDeleted': false,
        'singleEvents': true,
        'maxResults': 10,
        'orderBy': 'startTime'
    }).then(function(response) {
        var events = response.result.items;
        appendPre('Upcoming events:');

        if (events.length > 0) {
            for (i = 0; i < events.length; i++) {
                var event = events[i];
                var when = event.start.dateTime;
                if (!when) {
                     when = event.start.date;
                }
                appendPre(event.summary + ' (' + when + ')')
            }
        } else {
            appendPre('No upcoming events found.');
        }
    });
}

function addGoogleCalendar(title, startDate, endDate) {

    var event = {
        'summary': title,
        // 'location': '800 Howard St., San Francisco, CA 94103',
        'description': title,
        'start': {
            'dateTime': startDate,
            // 'timeZone': 'America/Los_Angeles'
        },
        'end': {
            'dateTime': endDate,
            // 'timeZone': 'America/Los_Angeles'
        },
        // 'recurrence': [
        'calendarId': 'primary',
        'resource': event
    };

    request.execute(function(event) {
        // appendPre('Event created: ' + event.htmlLink);
    });
}

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
    handleClientLoad();
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
            var title = prompt("Insira o nome do evento.", "Padrão");
            $("#calendario").fullCalendar('renderEvent', {
                title: title,
                start: startDate,
                end: endDate
            });

            // addGoogleCalendar(title, startDate, endDate);

            //envia para o nosso banco de dados, a ser implementado
            // $.post("insert-calendar-event.php", {title: title, startDate: startDate, endDate: endDate});
        }
    });


    $("#relatorio").on("click", function () {
        window.print();
    });
})()
