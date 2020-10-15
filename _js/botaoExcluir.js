$('#janela_transportadoras ul li a#excluir').click(function (e) {
    e.preventDefault();

    var id = $(this).parent().parent().attr("title");
    var elemento = $(this).parent().parent();

    $.ajax({
        type: "POST",
        data: "transportadoraID=" + id,
        url: "../_crud/excluir.php",
        async: false

    }).done(function (data) {
        $sucesso = $.parseJSON(data)["sucesso"];

        if ($sucesso) {
            elemento.fadeOut(); //remove o registro da lista
        } else {
            console.log("Erro na exclusão");
        }
    }).fail(function () {
        console.log("Erro");
    });
});