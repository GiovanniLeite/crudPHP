<?php require_once("../conexao/conexao.php") ?>
<?php
// tabela de transportadoras
$tr = "SELECT * FROM transportadoras ";
$consulta_tr = mysqli_query($conecta, $tr);
if (!$consulta_tr) {
    die("erro no banco");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Transportadoras</title>

    <link href="../_css/estilo.css" rel="stylesheet">

    <script src="../_js/jquery.js"></script>

</head>

<body>
    <main>
        <div id="janela_transportadoras">
            <?php
            while ($linha = mysqli_fetch_assoc($consulta_tr)) {
            ?>
                <ul title="<?php echo $linha["transportadoraID"] ?>">
                    <li><a href=""><?php echo $linha["nometransportadora"] ?></a></li>
                    <li><?php echo $linha["cidade"] ?></li>
                    <li><a href="formularioInserir.php" class="botao">Novo</a></li>
                    <li><a href="formularioAtualizar.php?&codigo='<?php echo $linha["transportadoraID"] ?>'" class="botao">Atualizar</a></li>
                    <li><a href="" class="botao" id="excluir">Excluir</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </main>
    <script src="../_js/botaoExcluir.js"></script>
</body>
<!-- teste git -->

</html>

<?php
// Fechar conexao
mysqli_close($conecta);
?>