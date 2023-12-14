<?php
    require_once '../model/conexao.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];

    $sql = "UPDATE produtos 
            SET prd_nome = '$nome',
                prd_quantidade = $quantidade,
                prd_preco = $preco,
                prd_descricao = '$descricao',
                prd_data_cad = DATE('$data'),
                prd_hora_cad = TIME('$data')
            WHERE prd_id = $id";
    $resultado = $conexao->query($sql);

    if ($resultado){
        $conexao->close();
        header('Location: ../view/paginas/edicao.php');
        exit;
    }
?>