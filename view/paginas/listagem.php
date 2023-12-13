<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/estilo copy 3.css">
        <title>Cadastro</title>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <?php include '../php/menu.php'; ?>
        <section class="container">
            <table class="tbPrincipal">
                <?php
                    require_once '../../model/conexao.php';

                    $sql = "SELECT prd_id, prd_nome, prd_quantidade, prd_preco, prd_descricao FROM produtos";
                    $resultado = $conexao->query($sql);

                    if ($resultado){
                        if ($resultado->num_rows > 0){
                            echo '  <tr>
                                        <th class="thHeader" align="left">Nome</th>
                                        <th class="thHeader" align="center">Descrição</th>
                                        <th class="thHeader" width="20%" align="right">Preço</th>
                                        <th class="thHeader" width="20%" align="right">Quantidade</th>
                                    </tr>';
                            while ($linha = $resultado->fetch_assoc()){
                                echo '<tr>
                                        <td class="tdInfo" nowrap="nowrap" align="left">'.$linha['prd_nome'].'</td>
                                        <td class="tdInfo" align="center">'.$linha['prd_descricao'].'</td>
                                        <td class="tdInfo" nowrap="nowrap" align="right">R$ '.number_format($linha['prd_preco'], 2, ',', '.').'</td>
                                        <td class="tdInfo" nowrap="nowrap" align="right">'.$linha['prd_quantidade'].'</td>
                                    </tr>';
                            }
                        }else{
                            echo '<tr><td align="center">Nenhum produto encontrado.</td></tr>';
                        }
                    }else{
                        echo "Erro na consulta: " . $conexao->error;
                    }

                    $conexao->close();
                ?>
            </table>
        </section>
    </body>
</html>