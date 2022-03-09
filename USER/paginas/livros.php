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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
  <link rel="shortcut icon" type="imagex/png" href="../../img/icons/logoEVF.ico">
</head>

<body>
  <!--NAVBAR-->
  <?php
  if ($_SESSION['validacao'] == "1") {
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
  } else if ($_SESSION['validacao'] == "2") {
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
    <h1 class="acao">Todos &emsp; os &emsp; Livros</h1>
  </div>
  <!-- PESQUISA POR GÊNERO -->
  <!-- <form method="post" action="livros.php">
    <label class="gen" for="genero">Selecione o Gênero:</label>
    <select class="chosen" id="genero" name="genero">
      <option value="">---</option>
      <option value="Ação">Ação</option>
      <option value="Misterio">Misterio</option>
      <option value="Fantasia">Fantasia</option>
      <option value="Ficção">Ficção</option>
      <option value="Suspense">Suspense</option>
      <option value="Romance">Romance</option>
    </select>
    <input type="submit" value="Confirmar" class="btnConfirm">
  </form>
  <?php
  // $var = "";
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   $var = $_POST["genero"];
  // } -->
  ?>
  <!-- FIM PESQUISA POR GÊNERO -->
  <?php
  include('../conn.php');
  $results_per_page = 25;
  $sql = "SELECT * FROM livros ORDER BY titulo ASC";
  $result = mysqli_query($conn, $sql);
  $number_of_results = mysqli_num_rows($result);
  $number_of_pages = ceil($number_of_results / $results_per_page);

  if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page = $_GET['page'];
  }

  $this_page_first_result = ($page - 1) * $results_per_page;
  $sql = "SELECT * FROM livros ORDER BY titulo ASC LIMIT " . $this_page_first_result . "," .  $results_per_page;
  $result = mysqli_query($conn, $sql);
  echo '<div class="swiper-container">
        <div class="swiper-wrapper">';
  while ($row = mysqli_fetch_array($result)) {
    echo '  <div class="swiper-slide">
                <a href="livroinfo.php?codigo=' . $row['cod'] . '">
                    <div class="slider-box">
                        <div class="img-box"> 
                            <img class="item" src ="../../' . $row['capa'] . '"/>
                        </div>
                        <p class="detail">
                            ' . $row['titulo'] . '
                            <br>
                            Gêneros: ' . $row['generos'] . '
                        </p>
                        <div class="cart">
                            Ler Mais
                        </div>
                    </div>
                </a>
            </div>';
  };
  echo '  </div>
      </div>';
  echo '<div class="pagination">';
  for ($page = 1; $page <= $number_of_pages; $page++) {
    echo '<a href="livros.php?page=' . $page . '" class="btn">' . $page . '</a>';
  }
  echo '</div>';

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
      Pedro Alonso, Thalles Santana e Yasmin Paiva.
    </p>
  </footer>
  <!-- FIM RODAPÉ -->
  <script type="text/javascript">
    $(".chosen").chosen();
  </script>
</body>

</html>