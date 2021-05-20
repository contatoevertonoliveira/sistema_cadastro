<?php

require_once 'classes/usuarios.php';
$us = new Usuario("projeto_comentarios","localhost:3312","root","");
$dados = $us->buscarTodosUsuarios();

session_start();

if(!isset($_SESSION['id_master']))
{
    header("location: index.php");
}

require_once 'verifica.php';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Comentários</title>
    <link rel="stylesheet" href="css/dados.css">
</head>
<body>

<nav>
    <a href="index.php"><span>techTon</span></a>
        <ul>
            <?php
                if(isset($_SESSION['id_master']) || isset($_SESSION['id_usuario']))
                { ?>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="discussao.php">Discussão</a></li>
                    <li><a href="sair.php">Sair</a></li>
                <?php } ?>
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

    <table>
        <tr id="titulo">
            <td>ID</td>
            <td>NOME</td>
            <td>E-MAIL</td>
            <td>COMENTARIOS</td>
        </tr>
        <?php
            if(count($dados) > 0)
            {
                foreach($dados as $v)
                { ?>
                    <tr>
                        <td><?php echo $v['id']; ?></td>
                        <td><?php echo $v['nome']; ?></td>
                        <td><?php echo $v['email']; ?></td>
                        <td><?php echo $v['Quantidade']; ?></td>
                    </tr>
<?php           }
            }else
            {
                echo "Ainda não há usuários cadastrados!";
            }
        ?>
    </table>
    
</body>
</html>