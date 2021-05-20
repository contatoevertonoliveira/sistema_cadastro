<?php

    class Usuario
    {
        private $pdo;

        //Construtor
        public function __construct($dbname, $host, $usuario, $senha)
        {
            try {
                $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $usuario, $senha);
            } catch (PDOException $e) {
                echo "Erro com BD: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }


        //Cadastrar
        public function Cadastrar($nome, $email, $senha)
        {
            //Antes de cadastrar, verificar se o e-mail já está cadastrado
            $cmd = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();

            if ($cmd->rowCount() > 0) //Encontrou o ID
            {
                return false;
            } else //Não encontrou o ID
            {
                $cmd = $this->pdo->prepare("INSERT INTO usuarios(nome, email, senha) VALUES (:n,:e,:s)");
                $cmd->bindValue(":n", $nome);
                $cmd->bindValue(":e", $email);
                $cmd->bindValue(":s", md5($senha));
                $cmd->execute();
                return true;
            }
        }

        //Logar
        public function Entrar($email, $senha)
        {
            $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :e AND senha = :s");
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":s", md5($senha));
            $cmd->execute();

            if ($cmd->rowCount() > 0) //Se foi encontrado a pessoa
            {
                $dados = $cmd->fetch();
                session_start();
                if ($dados['id'] == 1) {
                    //usuario master
                    $_SESSION['id_master'] = 1;
                } else {
                    //usuario normal
                    $_SESSION['id_usuario'] = $dados['id'];
                }
                return true; //encontrada
            } else {
                return false; //não encontrada
            }
        }


        public function buscarDadosUser($id)
        {
            $cmd = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $cmd->bindValue(":id",$id);
            $cmd->execute();
            $dados = $cmd->fetch();
            return $dados;
        }

        public function buscarTodosUsuarios()
        {
            $cmd = $this->pdo->prepare("SELECT usuarios.id, usuarios.nome, usuarios.email, COUNT(comentarios.id)
                                        as 'Quantidade' from usuarios
                                        left join comentarios on usuarios.id = comentarios.fk_id_user
                                        group by usuarios.id");
            $cmd->execute();
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        }

    }

?>
