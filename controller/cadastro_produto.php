<?php
    require_once '../model/conexao.php';

    if (isset($_POST['nome']) && isset($_POST['quantidade']) && isset($_POST['preco']) && isset($_POST['data'])){
        if ($_POST['nome'] != '' && $_POST['quantidade'] != '' && $_POST['preco'] != '' && $_POST['data'] != ''){
            $nome = $_POST['nome'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
            $descricao = $_POST['descricao'];
            $data = $_POST['data'];

            $sql = "INSERT INTO produtos (prd_nome, prd_quantidade, prd_preco, prd_descricao, prd_data_cad, prd_hora_cad) 
                    VALUES ('$nome', $quantidade, $preco, '$descricao', DATE('$data'), TIME('$data'))";
            $resultado = $conexao->query($sql);

            if ($resultado){
                $conexao->close();
                header('Location: ../view/paginas/cadastro.php');
                exit;
            }
        }else{
            $conexao->close();
            header('Location: ../view/paginas/cadastro.php');
        }
    }else{
        $conexao->close();
        header('Location: ../view/paginas/cadastro.php');
    }
?>