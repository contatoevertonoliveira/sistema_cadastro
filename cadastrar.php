
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Comentários</title>
    <link rel="stylesheet" href="css/cadastrar.css">
</head>
<body>

        <form method="POST">
            <h1>Cadastre-se</h1>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" maxlength="40">
            <label for="email">Email</label>
            <input type="email" name="email" autocomplete="off" id="email" maxlength="50">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
            <label for="confsenha">Confirmar Senha</label>
            <input type="password" name="confsenha" id="confsenha">
            <input type="submit" value="Cadastrar">   
        </form>   

</body>
</html>


<!-- ================================== PHP ====================================== -->

<?php
    if(isset($_POST['nome']))
    {
        $nome = htmlentities(addslashes($_POST['nome']));
        $email = htmlentities(addslashes($_POST['email']));
        $senha = htmlentities(addslashes($_POST['senha']));
        $confsenha = htmlentities(addslashes($_POST['confsenha']));

        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confsenha))
        {
            if($senha == $confsenha)
            {
                require_once 'classes/usuarios.php';
                $us = new Usuario("projeto_comentarios","localhost:3312","root","");
                if($us->Cadastrar($nome, $email, $senha))
                { ?>
                    <p class="mensagem">Cadastrado com Sucesso! | <a href="entrar.php">Acesse já!</a></p>
                <?php }else
                { ?>
                    <p class="mensagem">Email já existe!</p>
                <?php }
            }else
            { ?>
                <p class="mensagem">Senhas não correspondem!</p>
            <?php }
        }else
        { ?>
            <p class="mensagem">Preencha todos os campos</p>
        <?php }

    }
?>
