<?php
include('../../FUNCIONALIDADES/USER/protect.php');
if ($_SESSION['validacao'] != "1") {
    echo "  <script language='javascript' type='text/javascript'>
            alert('Você não pode acessar essa pagina');window.location.href='../../USER/paginas/index.php';
          </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVF-Bibliotech</title>
    <link rel="stylesheet" href="../css/mainAlterar.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" type="imagex/png" href="../../img/icons/logoEVF.ico">
</head>

<body>
    <!--NAVBAR-->
    <div class="wrapper">
        <nav>
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
            <div class="content">
                <div class="logo"><a href="../../USER/paginas/home.php">EVF-Bibliotech</a></div>
                <ul class="links">
                    <li><a href="../../USER/paginas/home.php">Inicio</a></li>
                    <li>
                        <a href="#" class="desktop-link">Livros <i class="fas fa-caret-down"></i></a>
                        <input type="checkbox" id="show-features">
                        <label for="show-features">Livros <i class="fas fa-caret-down"></i></label>
                        <ul>
                            <li><a href="../../USER/paginas/livros.php">Todos os Livros</a></li>
                            <li><a href="../../USER/paginas/livrospdf.php">Livros PDF</a></li>
                        </ul>
                    </li>
                    <li><a href="../../USER/paginas/pastaTrabalhos.php">Trabalhos</a></li>
                    <li><a href="../../USER/paginas/sugestao.php">Sugestões</a></li>
                    <li>
                        <a href="#" class="desktop-link">Listas <i class="fas fa-caret-down"></i></a>
                        <input type="checkbox" id="show-lists">
                        <label for="show-lists">Listas <i class="fas fa-caret-down"></i></label>
                        <ul>
                            <li><a href="../tabelas/tabelaLivros.php">Livros</a></li>
                            <li><a href="../tabelas/tabelaReservaAnalise.php">Reservas</a></li>
                            <li><a href="../tabelas/tabelaSugestões.php">Sugestões</a></li>
                            <li><a href="../tabelas/tabelaTrabalhos.php">Trabalhos</a></li>
                            <li><a href="../tabelas/tabelaUser.php">Usuarios</a></li>
                        </ul>
                    </li>
                    <li><a href="../../FUNCIONALIDADES/USER/sair.php">Sair</a></li>
                </ul>
            </div>
            <label for="show-search" id="ocultar" class="search-icon"><a href="../../FUNCIONALIDADES/USER/pesquisar/pesquisar.php"><i class="fas fa-search"></i></a></label>
        </nav>
    </div>
    <!--FIM NAVBAR-->

    <h1>.</h1>

    <form enctype="multipart/form-data" action="../../FUNCIONALIDADES/ADM/add.php" method="post">
        <div class="formulario">
            <div class="title">
                Adicionar Trabalho
            </div>
            <div class="form">
                <div class="inputfield">
                    <label>Titulo do Trabalho:</label>
                    <input type="text" class="input" name="nomeTrab" placeholder="Titulo do Trabalho" autocomplete="off">
                </div>
                <div class="inputfield">
                    <label>Autor(es):</label>
                    <input type="text" class="input" name="autor" placeholder="Autor(es) do Trabalho" autocomplete="off">
                </div>
                <div class="inputfield">
                    <label>Tipo:</label>
                    <input type="text" class="input" name="tipo" placeholder="Tipo de Trabalho" autocomplete="off">
                </div>
                <div class="inputfield">
                    <label>Ano de Produção:</label>
                    <input type="text" class="input" name="ano" placeholder="Ano de Produção do Trabalho" autocomplete="off">
                </div>
                <div class="inputfield">
                    <label>Link do Trabalho:</label>
                    <input type="file" name="link"></span>
                </div>
                <div class="inputfield">
                    <label>Sinopse:</label>
                    <textarea class="textarea" name="sinopse" placeholder="Sinopse do Trabalho"></textarea>
                </div>
                <div class="inputfield">
                    <input type="submit" value="Adicionar" class="btn" name="adicionarTrab">
                    <a href="../tabelas/tabelaTrabalhos.php"><input type="button" value="Voltar" class="btn"></a>
                </div>
            </div>
        </div>
    </form>

</body>

</html>