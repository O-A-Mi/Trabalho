<?php
    $host       = "localhost";
    $usuario    = "root";
    $senha      = "";
    $bd         = "trabalho";

    $conexao = new mysqli($host, $usuario, $senha, $bd);

    if ($conexao->connect_error){
        die("Erro na conex�o com o Banco: " . $conexao->connect_error);
    }
?>