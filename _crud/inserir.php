<?php require_once("../conexao/conexao.php") ?>
<?php
    if(isset($_POST["nometransportadora"])) {
        $nome       = $_POST["nometransportadora"];
        $endereco   = $_POST["endereco"];
        $cidade     = $_POST["cidade"];
        $estado     = $_POST["estados"];
        
        $inserir    = "INSERT INTO transportadoras ";
        $inserir    .= "(nometransportadora,endereco,cidade,estadoID) ";
        $inserir    .= "VALUES ";
        $inserir    .= "('$nome','$endereco','$cidade', $estado)";     
        
        $retorno = array();
        $operacao_insercao = mysqli_query($conecta,$inserir);
        
        if($operacao_insercao)
        {
            $retorno["sucesso"] = true;
            $retorno["mensagem"] = "Transportadora inserida com sucesso.";
        }
        else
        {
            $retorno["sucesso"] = false;
            $retorno["mensagem"] = "Falha no sistema, tente mais tarde.";
        }
        
        echo json_encode($retorno);
    }

    // Fechar conexao
    mysqli_close($conecta);
?>