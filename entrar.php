<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Comentários</title>
    <link rel="stylesheet" href="css/entrar.css">
</head>
<body>
        <span>techTon</span>

        <form method="POST">
            <h1>Acesse sua Conta</h1>
            <img src="img/envelope.png" alt="">
            <input type="email" name="email" autocomplete="off" maxlength="50">
            <img src="img/cadeado.png" alt="">
            <input type="password" name="senha" id="">
            <input type="submit" value="Entrar">
            <a href="cadastrar.php">Registre-se agora!</a>
        </form>
    
</body>
</html>



<?php

    if(isset($_POST['email']))
    {
        $email = htmlentities(addslashes($_POST['email']));
        $senha = htmlentities(addslashes($_POST['senha']));

        if(!empty($email) && !empty($senha))
        {
            require_once 'classes/usuarios.php';
            $us = new Usuario("projeto_comentarios","localhost:3312","root","");
            if($us->Entrar($email,$senha))
            {
                header("location:index.php");
            }else
            {
                echo "Email e/ou senha estão incorretos";
            }

        }else
        {
            echo "Preencha todos os campos!";
        }
    }





?>