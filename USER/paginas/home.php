<?php
  include('../../FUNCIONALIDADES/USER/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>EVF-Bibliotech</title>
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
  <!-- BANNER -->
  <div class="banner container">
    <div class="title">
      <h2> O que é a EVF-Bibliotech?</h2>
      <h3> É um projeto com o proposito de ajudar os alunos a fazerem o empréstimo de livros presentes na ETEC.</h3>
    </div>
    <div class="buttons">
      <a href="livros.php"><button class="btn btn-cadastrar bg-white radius"> Ver Livros <i class="fas fa-book-open"></i></button></a>
      <a href="pastaTrabalhos.php"><button class="btn btn-sobre bg-black radius"> Ver Trabalhos <i class="fas fa-arrow-circle-right"></i></button></a>
    </div>
  </div>
  <!-- FIM BANNER -->
  <!-- SUGESTÕES DE LIVROS -->
  <div class="teste3">
    <div class="tituloStyle">
      <h1 class="titulo">Sugestões de Livros</h1>
    </div>
    <div class="livros">

      <?php
      include('../conn.php');
      $SQL = "SELECT * FROM livros ORDER BY RAND() LIMIT 12";
      $result = $conn->query($SQL);
      if ($result->num_rows > 0) {
        while ($linha = $result->fetch_assoc()) {
          echo '<a href="livroinfo.php?codigo=' .$linha['cod'].'">
                  <div class="box">
                    <div class="imgBox"> 
                      <img src="../../'.$linha['capa'].'"/>
                    </div>
                    <div class="details">
                      <div class="info">
                        <h1>'.$linha['titulo'].'</h1>
                        <h2>Autor: '.$linha['autor'].'</h2>
                        <p>Ler Mais</p>
                      </div>
                    </div>
                  </div>
                </a>';
        };
        echo '</div>';
      } else {
        echo "Não há resultados";
      }
      $conn->close();
      ?>
      <!-- FIM SUGESTÕES DE LIVROS -->
      <!-- RODAPÉ -->
      <footer class="rodape container bg-gradient">
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-google"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fa fa-envelope"></i></a>
        </div>
        <p class="copyright"> Trabalho de Conclusão de Curso realizado pela grupo:
          <br>
          Pedro Alonso, Thalles Santana e Yasmin Paiva.
        </p>
      </footer>
      <!-- JQUERY -->
      <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>