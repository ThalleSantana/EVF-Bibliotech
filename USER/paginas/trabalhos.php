<?php
  include('../../FUNCIONALIDADES/USER/protect.php');
  $ano = $_GET['ano'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EVF-Bibliotech</title>
  <link rel="stylesheet" href="../css/mainLivros.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../css/navbar.css">
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
        <h1 class="acao">Trabalhos de <?php echo $ano?></h1>
    </div>
  <!--swiper slider-->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <!--slide 1-------------------------------------->
      <?php
      include('../conn.php');
      $results_per_page = 25;
      $sql = "SELECT * FROM trabalhos WHERE Ano_Trab = '$ano' ORDER BY Nome_Trab ASC";
      $result = mysqli_query($conn, $sql);
      $number_of_results = mysqli_num_rows($result);
      $number_of_pages = ceil($number_of_results / $results_per_page);

      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }

      $this_page_first_result = ($page - 1) * $results_per_page;
      $sql = "SELECT * FROM trabalhos WHERE Ano_Trab = '$ano' ORDER BY Nome_Trab ASC LIMIT " . $this_page_first_result . "," .  $results_per_page;
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        while ($linha = mysqli_fetch_array($result)) {
          echo '<a href="trabalhoinfo.php?codigo='.$linha['Cod'].'">
                        <div class="swiper-slide">
                            <div class="slider-box">
                                <div class="img-box"> 
                                    <img class="item" src ="../../img/icons/pdf.png"/>
                                </div>
                                <p class="detail">
                                    '.$linha['Nome_Trab'].'
                                    <br>
                                    '.$linha['Tipo_Trab'].'
                                </p>
                                <div class="cart">
                                    Ler Mais
                                </div>
                            </div>
                        </div>
                    </a>';
        };
        echo ' </div>
    </div>';
      } else {
        echo "Não há resultados";
      }

      echo '<div class="pagination">';
        for ($page = 1; $page <= $number_of_pages; $page++) {
          echo '<a href="trabalhos.php?page=' . $page . '&ano='.$ano.'" class="btn">' . $page . '</a>';
        }
      echo '</div>';

      $conn->close();
      ?>

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