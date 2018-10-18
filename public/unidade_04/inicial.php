<?php require_once("../../conexao/conexao.php"); ?>

<?php
    // Consulta ao banco de dados
    $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena";
    $produtos .= " FROM produtos ";
    $resultado = mysqli_query($conecta, $produtos);
    if(!$resultado){
        die("Fala na consulta ao banco");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
    </head>

    <body>
        
        <?php include "_incluir/topo.php"; ?>
        
        <main>  
            
            <?php
                while($linha = mysqli_fetch_assoc($resultado)){
            ?>
            <ul>
                <li><img src="<?php echo $linha["imagempequena"] ?>"></li>
                <li><?php echo $linha["nomeproduto"] ?></li>
                <li>Tempo de entrega: <?php echo $linha["tempoentrega"] ?></li>                    
                <li>Pre&ccedil;o unit&aacute;rio: <?php echo $linha["precounitario"] ?></li>    
            </ul>

            <?php } ?>
        </main>

        <?php include "_incluir/rodape.php"; ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>