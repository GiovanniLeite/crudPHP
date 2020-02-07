<?php require_once("../conexao/conexao.php") ?>
<?php
    // Consulta a tabela de transportadoras
    $tr = "SELECT * FROM transportadoras ";
    if(isset($_GET["codigo"]) ) {
        $id = $_GET["codigo"];
        $tr .= "WHERE transportadoraID = {$id} ";
    } else {
        $tr .= "WHERE transportadoraID = 1 ";
    }

    // cria objeto com dados da transportadora
    $con_transportadora = mysqli_query($conecta,$tr);
    if(!$con_transportadora) {
        die("Erro na consulta");
    }
    $info_transportadora = mysqli_fetch_assoc($con_transportadora);

    // consulta aos estados
    $estados = "SELECT * ";
    $estados .= "FROM estados ";
    $lista_estados = mysqli_query($conecta, $estados);
    if(!$lista_estados) {
       die("erro no banco"); 
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Atualizar Transportadora</title> 
        
        <link href="../_css/estiloFormulario.css" rel="stylesheet">
        
        <script src="../_js/jquery.js"></script>
    </head>

    <body>
        <main>  
            <div id="janela_formulario">
                
                <form id="formulario_transportadora">
                    <label for="nometransportadora">Nome da Transportadora</label>
                    <input type="text" value="<?php echo $info_transportadora["nometransportadora"]  ?>" name="nometransportadora" id="nometransportadora">

                    <label for="endereco">Endereço</label>
                    <input type="text" value="<?php echo $info_transportadora["endereco"]  ?>" name="endereco" id="endereco">

                    <label for="cidade">Cidade</label>
                    <input type="text" value="<?php echo $info_transportadora["cidade"]  ?>" name="cidade" id="cidade">

                    <label for="estados">Estados</label>
                    <select id="estados" name="estados"> 
                        <?php 
                            $meuestado = $info_transportadora["estadoID"];
                            while($linha = mysqli_fetch_assoc($lista_estados)) {
                                $estado_principal = $linha["estadoID"];
                                if($meuestado == $estado_principal) {
                        ?>
                            <option value="<?php echo $linha["estadoID"] ?>" selected>
                                <?php echo $linha["nome"] ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha["estadoID"] ?>" >
                                <?php echo $linha["nome"] ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
                    </select>
                    
                    <input type="hidden" name="transportadoraID" value="<?php echo $info_transportadora["transportadoraID"] ?>">
                    <input type="submit" value="Confirmar alteração">  
                    
                    <div id="mensagem">
                        <p></p>
                    </div>
                </form> 
                <a href="index.php" id="voltar">Voltar</a>
            </div>
        </main>

        <script src="../_js/botaoAtualizar.js"></script>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>