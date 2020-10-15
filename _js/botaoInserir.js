$('#formulario_transportadora').submit(function (e) {
    e.preventDefault();
    var formulario = $(this);
    var retorno = inserirFormulario(formulario);
});

function inserirFormulario(dados) {
    $.ajax({
        type: "POST",
        data: dados.serialize(),
        url: "../_crud/inserir.php",
        async: false
    }).then(sucesso, falha);

    function sucesso(data) {
        $sucesso = $.parseJSON(data)["sucesso"];
        $mensagem = $.parseJSON(data)["mensagem"];

        $('#mensagem').show();
        if ($sucesso) {
            $('#mensagem p').html($mensagem);
        } else {
            $('#mensagem p').html($mensagem);
        }
    }

    function falha() {
        console.log("erro");
    }
}