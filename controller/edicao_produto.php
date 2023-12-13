<?php
    require_once '../model/conexao.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE produtos 
            SET prd_nome = '$nome', prd_quantidade = $quantidade, prd_preco = $preco, prd_descricao = '$descricao' 
            WHERE prd_id = $id";
    $resultado = $conexao->query($sql);

    if ($resultado){
        $conexao->close();
        header('Location: ../view/paginas/edicao.php');
        exit;
    }
?>