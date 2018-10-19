<?php require_once("../../conexao/conexao.php"); ?>
<?php 

    if ( isset($_GET["codigo"]) ) { // Pergunto se está configurado o parâmetro 'código' na 'url'
        $produto_id = $_GET["codigo"]; // Parâmetro de URL
    } else {
        Header("Location: inicial.php"); // Se eu digitar detalhe.php, será redirecionado para inicial.php
    }

    // Consulta ao banco de dados
    $consulta = "SELECT * ";
    $consulta .= "FROM produtos ";
    $consulta .= "WHERE produtoID = {$produto_id} "; // Filtro banco de dados
    $detalhe   = mysqli_query($conecta, $consulta); // Coneco ao banco e faço consulta

    // Testar erro
    if ( !$detalhe ) { // Não funcionamento
        die("Falha no Banco de dados");
    } else {
        $dados_detalhe   = mysqli_fetch_assoc($detalhe); // transforma em array associativo
        $produtoID       = $dados_detalhe["produtoID"];
        $nomeproduto     = $dados_detalhe["nomeproduto"];
        $descricao       = $dados_detalhe["descricao"];
        $codigobarra     = $dados_detalhe["codigobarra"];
        $tempoentrega    = $dados_detalhe["tempoentrega"];
        $precorevenda      = $dados_detalhe["precorevenda"];
        $precounitario   = $dados_detalhe["precounitario"];
        $estoque         = $dados_detalhe["estoque"];
        $imagemgrande    = $dados_detalhe["imagemgrande"];
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
        
        <!-- estilo -->
        <link href="_css/estilo.css" rel="stylesheet">
        <link href="_css/produto_detalhe.css" rel="stylesheet">
    </head>

    <body>
        <?php include_once("_incluir/topo.php"); ?>
        
        <main>  
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem"><img src="<?php echo $imagemgrande ?>"></li>
                    <li><h2><?php echo $nomeproduto ?></h2></li>
                    <li><b>Descrição: <?php echo $descricao ?></b></li>
                    <li><b>Código de barra: <?php echo $codigobarra ?></b></li>
                    <li><b>Tempo de entrega: <?php echo $tempoentrega ?></b></li>
                    <li><b>Preço de revenda: R$ <?php echo number_format($precorevenda, 2, ",", ".") ?></b></li> <!-- , quando for decimal e . quando for mil -->
                    <li><b>Preço unitário: R$ <?php echo number_format($precounitario, 2, ',', '.') ?></b></li>
                    <li><b>Estoque: <?php echo $estoque ?></b></li>
                </ul>
                
            </div>
        </main>

        <?php include_once("_incluir/rodape.php"); ?>
    </body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>