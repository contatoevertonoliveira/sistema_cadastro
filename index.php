<?php

require_once 'classes/usuarios.php';

session_start();

require_once 'verifica.php';


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
        <a href="index.php"><span class="logo">techTon</span></a>


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

    </nav>

    <h3>Sejam bem vindos. Escolha sua opção abaixo:</h3>

    <section>
        <div class="container">
            <div class="card"><a class="links" href="#"><span class="textContent">Entrar</span></a></div>
            <div class="card"><a class="links" href="#"><span class="textContent">Discussão</span></a></div>
            <div class="card"><a class="links" href="#"><span class="textContent">Cadastro</span></a></div>  
        </div>
    </section>

    
</body>

</html>