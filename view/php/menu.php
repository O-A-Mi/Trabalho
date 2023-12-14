<?php
    /*****Fazendo com que o horário em nas telas seja o horário do Brazil*****/
    date_default_timezone_set('Brazil/East');
    /*****Criando as opções*****/
    $opcoes = '
                <a href="cadastro.php">Cadastro de Produtos</a>
                <a href="edicao.php">Edição de Produtos</a>
                <a href="excluir.php">Exclusão de Produtos</a>
                <a href="listagem.php">Listagem de Produtos</a>
            ';
    echo '
            <header>
                <span class="abrir-btn" onclick="mudancaMenu()">&#9776;</span>
            </header>
            <nav id="menu">
                <span class="fechar-btn" onclick="fecharMenu()">&#9776;</span>'.$opcoes.'
            </nav>
        ';
?>