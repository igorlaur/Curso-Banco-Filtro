 <?php include_once '../../conexao/conexao.php'; ?> <!-- Escondi as principais informações do banco de dados para o usuário não ver -->

<?php 
    // Passo 3 - Abrir consulta ao banco de dados
    $consulta_categorias = "SELECT nomeproduto";
    $consulta_categorias .= " FROM produtos";
    $categorias = mysqli_query($conecta, $consulta_categorias);

    if(!$categorias){ // ! = e for falso
        die("Falha na consulta ao banco.");
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
    </head>
    <body>
        
        <ul>
            <?php 
                // Passo 4 - Listagem dos dados
                while ( $registro = mysqli_fetch_assoc($categorias)) { ?> <!-- pegar linha por linha na tabela categorias -->
                    <li><?php echo $registro["nomeproduto"] ?></li> <!-- Consulto o NOMEPRODUTO da minha tabela do banco de dados -->
            <?php } ?>
        </ul>

        <?php
            // Passo 5 - Liberar dados da memória
            mysqli_free_result($categorias);
        ?>

    </body>
</html>

<?php
    // Passo 6 - Fechar conexão
    mysqli_close($conecta) // Fechar conexão
?>