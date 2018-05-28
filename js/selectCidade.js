//UM ARQUIVO SEPARADO?
$(function(){
    //Evento
    $('#estado').change(function(){
        // se nada for selecionado
        if (!$(this).val()) {
            $('#cidade').html('<option value="">-- Escolha um estado --</option>');

            return false;

        } 

        $('#cidade').hide();
        $('.carregando').show();

        //AJAX
        $.getJSON(
            'selectCidade.php', //<-- URL
            { // <-- AQUI COMEÇA OS VALORES
                estado: $(this).val(),
                ajax: 'true'
            }, // <-- AQUI TERMINA
            function(j) { //<-- RESPOSTA
                var options = '<option value=""></option>';
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' +
                    j[i].id_cidade + '">' +
                    j[i].cidade + '</option>';
                }
                $('#cidade').html(options).show();
                $('.carregando').hide();
            }
        );
    });
});
