// $(function () {
// 	$("#calendar").fullCalendar({});
// })

//-----------------Função que valida o CNPJ-----------------------------------------
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
        cnpj == "99999999999999"
    ) {
        return false;
        
    }

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
//-----------------Evento de Sumir a listagem de produtos-----------------------------------------

    $("#produto_proprio").on("change", function () {
        $("#lista_produtos").toggle('slow');
        $("#form-add-produto").toggle('slow');
    });

//-----------------Validação de cnpj de clientes-----------------------------------------

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



//-----------------Print-----------------------------------------
    $("#relatorio").on("click", function () {
        window.print();
    });
//-----------------Barra de pesquisa de produto-----------------------------------------
    
    $.get("selectProduto.php", function (response) {
        var data = response;
        $( "#txtBusca" ).autocomplete({
            source: data,
            focus: function( event, ui ) {
                $(this).val(ui.item.label);
                return false;
            },
            select: function( event, ui ) {
                $(this).data("product-id", ui.item.value);
                $(this).data("label", ui.item.label);
                $(this).val(ui.item.label);

                return false;
            }
        });

    } , "json");

//-----------------Mascara de formulário---------------------------------------

    $('.cep').mask('99999-999');
    $('.cnpj').mask('99.999.999/9999-99');
    $('#ddd').mask('(99)');
    $('.ddd').mask('(99)');
    $('#telefone').mask('9999 - 9999?9');
    $('.telefone').mask('9999 - 9999?9');
    // if ($('#tipo_telefone') == 'celular') {
    //     $('.telefone').mask('99999 - 9999');
    // }
//-----------------Mascara de Letra Mauiscula---------------------------------------

    $(document).on("keyup", ".title_case", function(){
        var valorInput = $(this).val();

        //transforma em title case
        if (valorInput == "") {
            return false;
        }

        var palavras = valorInput.toLowerCase().split(" ");
        for (var i = palavras.length - 1; i >= 0; i--) {
            if (palavras[i] == "") {
                continue;
            }
            palavras[i] = palavras[i].split("");
            
            palavras[i][0] = palavras[i][0].toUpperCase();
            palavras[i] = palavras[i].join("");
        }
        valorInput = palavras.join(" ");

        //seta valor do input
        $(this).val(valorInput);

    })


//-----------------Adicionar na lista de produto----------------------------------------
    
    $(document).on("click", "#btnadicionar", function (event) {
        event.preventDefault();

        // pega os valores
        var txtBusca = $("#txtBusca");
        var nome = txtBusca.val();
        var quantidade = parseInt($("#quantidade_produto").val(), 10);
        var productId = txtBusca.data("product-id");

        // verifica se são validos
        if (nome == "" || quantidade == "" || productId == "" || typeof productId == "undefined") {
            alert("Produto não disponivel em estoque.");
            return false;
        }

        //valida quantidade no banco de dados
        $.get(
            "estoque/valida-produto.php",
            {produto: nome, quantidade: quantidade, productId: productId}
        )
        .then(function (response, textStatus, xhr) {
            // Verifica se o elemento ja foi criado
            var idProduto = "produto-"+nome.toLowerCase();
            if ($("#" + idProduto).length) {
                // Se ele ja foi criado sobrescreve q quantidade
                $("#" + idProduto).data("quantidade", parseInt($("#" + idProduto).data("quantidade"), 10) + quantidade);
                
                // Atualiza a quantidade
                var html = $("#" + idProduto + " p").text();
                html = html.replace(/(Quantidade:\s)\d+/, '$1' + parseInt($("#" + idProduto).data("quantidade"), 10));
                $("#" + idProduto + " p").text(html);
                return false;
            }
            
            // cria o elemento
            var paragraph = $("<p>");

            var text = $("<p>");            
            text.text("Produto: " + nome + " - Quantidade: " + quantidade);
            text.css("display", "inline-block");
            paragraph.append(text);

            paragraph.attr("id", idProduto);
            paragraph.css("display", "none");
            paragraph.data("quantidade", quantidade);

            // Cria o botão de exclusão
            var btnExcluir = $("<i>");
            btnExcluir.addClass("fa fa-times exclui-item-lista-produto");
            btnExcluir.data("produto", nome.toLowerCase());

            // cria input hidden para envio
            if ($("input[name=\"produtos\"").length == 0) {
                var input = $("<input>");
                input.attr("type", "hidden");
                input.attr("name", "produtos");
                input.attr("value", nome+ "|" + quantidade);
                
            } else {
                var valProdutos = $("input[name=\"produtos\"").val();
                valProdutos = valProdutos + "," + nome +"|" + quantidade;
                $("input[name=\"produtos\"").val(valProdutos);
            }

            //Adiciona o botão ao paragrafo
            paragraph.append(input);
            paragraph.append(btnExcluir);

            // Adiciona o elemento criado no HTML        
            $("#lista_produtos").append(paragraph);
            $("#lista_produtos").fadeIn();
            paragraph.fadeIn("slow");

            // limpa os campos
            $("#txtBusca").val("")
                .data("product-id", "")
                .data("label", "");
            $("#quantidade_produto").val("");
        }, function () {
            alert("Quantidade acima do que há em estoque.");
            $("#txtBusca").val("")
                .data("product-id", "")
                .data("label", "");
            $("#quantidade_produto").val("");
            return false;
        });

    });

    $(document).on("click", ".exclui-item-lista-produto", function () {
        var produto = $(this).data("produto");

        $("#produto-" + produto).fadeOut("slow").remove();

        if ($("#lista_produtos").children("p").length == 0) {
            $("#lista_produtos").fadeOut();
        }
    });

    
})()

