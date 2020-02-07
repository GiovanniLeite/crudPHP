<?php
    //Abrir conexao
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

    //Testar conexao
    if( mysqli_connect_errno() )
    {
        die("Conexão falhou: " . mysqli_connect_errno() );
    }
?>