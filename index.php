<?php

require_once 'classes/usuarios.php';

session_start();
if(isset($_SESSION['id_usuario']))
{
    $us = new Usuario("projeto_comentarios","localhost:3312","root","");
    $informacoes = $us->buscarDadosUser($_SESSION['id_usuario']);
}elseif(isset($_SESSION['id_master']))
{
    $us = new Usuario("projeto_comentarios","localhost:3312","root","");
    $informacoes = $us->buscarDadosUser($_SESSION['id_master']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <title>Sistema de Comentários</title>

    <link rel="stylesheet" href="css/style.css" />

</head>

<body>

    <nav>
        <ul>
            <?php
                if(isset($_SESSION['id_master']))
                { ?>
                    <li><a href="dados.php">Dados</a></li>
                <?php }
            ?>
            <li><a href="discussao.php">Discussão</a></li>
            <?php
                if(isset($informacoes))
                { ?>
                    <li><a href="sair.php">Sair</a></li>
                <?php }else
                { ?>
                    <li><a href="entrar.php">Entrar</a></li>
                <?php }
                ?>
            
        </ul>
    </nav>

    

    <?php
        if(isset($_SESSION['id_master']) || isset($_SESSION['id_usuario']))
        { ?>
            <h2>
                <?php echo "Olá ";
                echo $informacoes['nome'];
                echo ", seja bem vindo(a)!";
                ?>
            </h2>
    <?php } ?>

    <h3>CONTEÚDO QUALQUER</h3>
</body>

</html>