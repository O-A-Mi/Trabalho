<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/estilo.css">
        <title>Cadastro</title>
        <script src="../js/script.js"></script>
    </head>
    <body>
        <?php include '../php/menu.php'; ?>
        <section class="container">
            <form action="../../controller/cadastro_produto.php" method="post" name="cadastro_produto">
                <table width="100%">
                    <tr>
                        <td colspan="2">
                            <label>Nome:</label>
                            <input id="nome" type="text" name="nome">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Preço:</label>
                            <input id="preco" type="text" name="preco" pattern="[0-9]+([,\.][0-9]+)?" oninput="formataDecimal(this)">
                        </td>
                        <td>
                            <label>Quantidade:</label>
                            <input id="quantidade" type="number" name="quantidade" min="0">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Descrição:</label>
                            <textarea id="textarea" name="descricao" rows="4" oninput="mudaTamanho()"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Data e Hora:</label>
                            <input type="datetime-local" name="data" <?php echo 'value="'.date('Y-m-d').'T'.date('H:i').'"'?>>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><button type="submit">Cadastrar Produto</button></td>
                    </tr>
                </table>
            </form>
        </section>
    </body>
</html>