<?php
    require_once '../model/conexao.php';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $sql = 'DELETE FROM produtos WHERE prd_id = '.$id.'';
        $resultado = $conexao->query($sql);

        if ($resultado){
            $conexao->close();
            header('Location: ../view/paginas/excluir.php');
            exit;
        }
    }else{
        echo "<script>window.alert('ID do produto inválido.');</script>";
        $conexao->close();
        header('Location: ../view/paginas/excluir.php');
        exit;
    }
?>