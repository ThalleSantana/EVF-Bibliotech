<?php
    include('../../FUNCIONALIDADES/USER/protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EVF-Bibliotech</title>
  <link rel="stylesheet" href="../css/mainLivros.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  <script type="text/javascript" src="../js/javascriptpersonalizado.js"></script>
  <link rel="shortcut icon" type="imagex/png" href="../../img/icons/logoEVF.ico">
</head>

<body>
  <!--NAVBAR-->
  <?php
    if($_SESSION['validacao'] == "1"){
      echo '<div class="wrapper">
      <nav>
        <input type="checkbox" id="show-search">
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
        <div class="content">
          <div class="logo"><a href="home.php">EVF-Bibliotech</a></div>
          <ul class="links">
            <li><a href="home.php">Inicio</a></li>
            <li>
              <a href="#" class="desktop-link">Livros <i class="fas fa-caret-down"></i></a>
              <input type="checkbox" id="show-features">
              <label for="show-features">Livros <i class="fas fa-caret-down"></i></label>
              <ul>
                <li><a href="livros.php">Todos os Livros</a></li>
                <li><a href="livrospdf.php">Livros PDF</a></li>
              </ul>
            </li>
            <li><a href="pastaTrabalhos.php">Trabalhos</a></li>
            <li><a href="sugestao.php">Sugestões</a></li>
            <li>
              <a href="#" class="desktop-link">Listas <i class="fas fa-caret-down"></i></a>
              <input type="checkbox" id="show-lists">
              <label for="show-lists">Listas <i class="fas fa-caret-down"></i></label>
              <ul>
                <li><a href="../../ADM/tabelas/tabelaLivros.php">Livros</a></li>
                <li><a href="../../ADM/tabelas/tabelaReservaAnalise.php">Reservas</a></li>
                <li><a href="../../ADM/tabelas/tabelaSugestão.php">Sugestões</a></li>
                <li><a href="../../ADM/tabelas/tabelaTrabalhos.php">Trabalhos</a></li>
                <li><a href="../../ADM/tabelas/tabelaUser.php">Usuarios</a></li>
              </ul>
            </li>
            <li><a href="../../FUNCIONALIDADES/USER/sair.php">Sair</a></li>
          </ul>
        </div>
        <label for="show-search" id="ocultar" class="search-icon"><a href="pesquisar.php"><i class="fas fa-search"></i></a></label>
      </nav>
    </div>';
    }else if($_SESSION['validacao'] == "2"){
      echo '<div class="wrapper">
      <nav>
        <input type="checkbox" id="show-search">
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
        <div class="content">
          <div class="logo"><a href="home.php">EVF-Bibliotech</a></div>
          <ul class="links">
            <li><a href="home.php">Inicio</a></li>
            <li>
              <a href="#" class="desktop-link">Livros <i class="fas fa-caret-down"></i></a>
              <input type="checkbox" id="show-features">
              <label for="show-features">Livros <i class="fas fa-caret-down"></i></label>
              <ul>
                <li><a href="livros.php">Todos os Livros</a></li>
                <li><a href="livrospdf.php">Livros PDF</a></li>
              </ul>
            </li>
            <li><a href="pastaTrabalhos.php">Trabalhos</a></li>
            <li><a href="sugestao.php">Sugestões</a></li>
            <li>
              <a href="#" class="desktop-link">Conta <i class="fas fa-caret-down"></i></a>
              <input type="checkbox" id="show-services">
              <label for="show-services">Conta <i class="fas fa-caret-down"></i></label>
              <ul>
                <li><a href="reservalivro.php">Livros Reservados</a></li>
                <li><a href="../../FUNCIONALIDADES/USER/sair.php">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
        <label for="show-search" id="ocultar" class="search-icon"><a href="pesquisar.php"><i class="fas fa-search"></i></a></label>
      </nav>
    </div>';
    }
  ?>
  <!--FIM NAVBAR-->
  <div class="heading">
    <h1 class="acao">Pesquisa &emsp; de &emsp; Livros</h1>
  </div>
  <form method="POST" id="form-pesquisa" action="">
    <div class="gen">Pesquisar: <input type="text" class="titLivro" name="pesquisa" id="pesquisa" placeholder="Nome do Livro" autocomplete="off"></div>
    <input type="submit" name="enviar" value="Pesquisar" class="btnConfirm">
  </form>
  <!--swiper slider-->
  <div class="swiper-container">
    <div class="swiper-wrapper resultado">

    </div>
  </div>

  <script type="text/javascript">
    $(".chosen").chosen();
  </script>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

</body>

</html>