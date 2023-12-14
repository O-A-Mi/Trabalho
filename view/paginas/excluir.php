<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/estilo.css">
        <title>Exluir</title>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <!---Incluindo o menu lateral, feito como um código a parte para não ser repetido diversas vezes em todas as páginas--->
        <?php include '../php/menu.php'; ?>
        <section class="container">
            <table class="tbPrincipal">
                <!---Selecionando as informações do banco--->
                <?php
                    require_once '../../model/conexao.php';

                    $sql = "SELECT prd_id, prd_nome, prd_quantidade, prd_preco, prd_data_cad, prd_hora_cad FROM produtos";
                    $resultado = $conexao->query($sql);

                    if ($resultado){
                        /*****Caso a consulta retorne produtos*****/
                        if ($resultado->num_rows > 0){
                            echo '  <tr>
                                        <th class="thHeader" align="left">Nome</th>
                                        <th class="thHeader" width="20%" align="right">Quantidade</th>
                                        <th class="thHeader" width="20%" align="right">Preço</th>
                                        <th class="thHeader" width="20%" align="center">Data de Cadastro</th>
                                        <th class="thHeader" width="1"></th>
                                    </tr>';
                            /*****Fazendo um loop dos produtos encontrados pela consulta*****/
                            while ($linha = $resultado->fetch_assoc()){
                                $data = date_create($linha['prd_data_cad']);
                                $hora = date_create($linha['prd_hora_cad']);
                                echo '<tr>
                                        <td class="tdInfo" nowrap="nowrap" align="left">'.$linha['prd_nome'].'</td>
                                        <td class="tdInfo" nowrap="nowrap" align="right">'.$linha['prd_quantidade'].'</td>
                                        <td class="tdInfo" nowrap="nowrap" align="right">R$ '.number_format($linha['prd_preco'], 2, ',', '.').'</td>
                                        <td class="tdInfo" nowrap="nowrap" align="center">'.date_format($data, "d/m/Y").' às '.date_format($hora, "H:i:s").'</td>
                                        <td class="tdInfo"><a style="font-size: 28px; text-decoration: none; color: gray;" href="../../controller/excluir_produto.php?id='.$linha['prd_id'].'">&times;</a></td>
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