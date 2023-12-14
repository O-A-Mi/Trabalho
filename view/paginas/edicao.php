<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/estilo.css">
        <title>Edição</title>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <!---Incluindo o menu lateral, e requisitando o arquivo de conexão com o banco de dados--->
        <?php
            include '../php/menu.php';
            require_once '../../model/conexao.php';
        ?>
        <section class="container">
            <form action="edicao.php?psq=Sim" method="post" name="pesquisa">
                <table width="100%">
                        <!---Selecionando as informações do banco--->
                        <?php
                            $sql = "SELECT prd_id, prd_nome FROM produtos";
                            $resultado = $conexao->query($sql);

                            if ($resultado){
                                echo '<tr>';
                                /*****Caso a consulta retorne produtos*****/
                                if ($resultado->num_rows > 0){
                                    echo '
                                        <td>
                                            <select name="produto" class="formSelect">';
                                                /*****Fazendo um loop dos produtos encontrados pela consulta*****/
                                                while ($linha = $resultado->fetch_assoc()){
                                                    echo '<option value="'.$linha['prd_id'].'">'.$linha['prd_nome'].'</option>';
                                                }
                                    echo '  </select>
                                        </td>';
                                }else{
                                    echo '<td align="center">Nenhum produto encontrado.</td>';
                                }
                                echo '</tr>';
                            }else{
                                echo "Erro na consulta: " . $conexao->error;
                            }
                        ?>
                        <tr>
                            <td align="center" colspan="2"><button type="submit">Pesquisar</button></td>
                        </tr>
                </table>
            </form>
            <?php
                if (isset($_GET['psq']) && $_GET['psq'] == 'Sim'){
                    if (isset($_POST['produto']) && is_numeric($_POST['produto'])){
                        require_once '../../model/conexao.php';

                        $id = $_POST['produto'];

                        $sql = "SELECT prd_nome, prd_quantidade, prd_preco, prd_descricao, prd_data_cad, prd_hora_cad FROM produtos WHERE prd_id = $id";
                        $pesquisa = $conexao->query($sql);

                        if ($pesquisa){
                            $linha = $pesquisa->fetch_assoc();
                            if (!is_null($linha['prd_nome']) && !is_null($linha['prd_preco']) && !is_null($linha['prd_quantidade']) && !is_null($linha['prd_descricao'])){
                                /*****Imprimindo as informações para edição*****/
                                echo '
                                <form style="margin-top: 40px;" action="../../controller/edicao_produto.php" method="post" name="edicao_produto">
                                    <input type="hidden" value="'.$id.'" name="id">
                                    <table width="100%">
                                        <tr>
                                            <td colspan="2">
                                                <label>Nome:</label>
                                                <input id="nome" type="text" name="nome" value="'.$linha['prd_nome'].'">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Preço:</label>
                                                <input id="preco" type="text" name="preco" pattern="[0-9]+([,\.][0-9]+)?" oninput="formataDecimal(this)" value="'.$linha['prd_preco'].'">
                                            </td>
                                            <td>
                                                <label>Quantidade:</label>
                                                <input id="quantidade" type="number" name="quantidade" min="0" value="'.$linha['prd_quantidade'].'">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <label>Descrição:</label>
                                                <textarea id="textarea" name="descricao" oninput="mudaTamanho()">'.$linha['prd_descricao'].'</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>Data e Hora:</label>
                                                <input type="datetime-local" name="data" value="'.$linha['prd_data_cad'].'T'.date('H:i', strtotime($linha['prd_hora_cad'])).'">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2"><button type="submit">Editar</button></td>
                                        </tr>
                                    </table>
                                </form>
                                ';
                            }else{
                                $conexao->close();
                                header('Location: edicao.php');
                            }
                        }else{
                            echo "Erro na consulta: " . $conexao->error;
                        }
                        $conexao->close();
                    }else{
                        $conexao->close();
                        header('Location: edicao.php');
                    }
                }
            ?>
        </section>
    </body>
</html>