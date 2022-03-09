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
    <!--slider 1 bags------------------------------------------>
    <div class="heading">
        <h1 class="acao">Pasta de Trabalhos</h1>
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <a href="trabalhos.php?ano=2021">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2021
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="trabalhos.php?ano=2020">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2020
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="trabalhos.php?ano=2019">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2019
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="trabalhos.php?ano=2018">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2018
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2017
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2016
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2015
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2014
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2013
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2012
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2011
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="swiper-slide">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../img/icons/pasta.png"/>
                        </div>
                        <p class="detail" style="font-size: 25px;">
                            Ano: 2010
                        </p>
                        <div class="cart">
                            Ver Pasta
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

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
                          Pedro Alonso, Thalles Santana e Yasmin Paiva.</p>
  </footer>
  <!-- FIM RODAPÉ -->
</body>

</html>