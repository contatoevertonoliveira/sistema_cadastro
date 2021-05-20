<?php

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