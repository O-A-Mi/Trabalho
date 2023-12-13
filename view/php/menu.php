<?php
    $pagina_atual = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],'/')+1);
    if ($pagina_atual == 'cadastro.php'){
        $opcoes = '
                    <a href="listagem.php">Listagem de Produtos</a>
                    <a href="edicao.php">Edição de Produtos</a>
                    <a href="excluir.php">Exclusão de Produtos</a>
                ';
    }else if ($pagina_atual == 'listagem.php'){
        $opcoes = '
                    <a href="cadastro.php">Cadastro de Produtos</a>
                    <a href="edicao.php">Edição de Produtos</a>
                    <a href="excluir.php">Exclusão de Produtos</a>
                ';
    }else if ($pagina_atual == 'edicao.php'){
        $opcoes = '
                    <a href="cadastro.php">Cadastro de Produtos</a>
                    <a href="listagem.php">Listagem de Produtos</a>
                    <a href="excluir.php">Exclusão de Produtos</a>
                ';
    }else if ($pagina_atual == 'excluir.php'){
        $opcoes = '
                    <a href="cadastro.php">Cadastro de Produtos</a>
                    <a href="listagem.php">Listagem de Produtos</a>
                    <a href="edicao.php">Edição de Produtos</a>
                ';
    }else{}
    echo '
        <header>
            <span class="abrir-btn" onclick="mudancaMenu()">&#9776;</span>
        </header>
        <nav id="menu">
            <span class="fechar-btn" onclick="fecharMenu()">&#9776;</span>'.$opcoes.'</nav>';
?>