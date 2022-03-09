<?php

  // VERIFICAÇÃO DE LOGIN, LIVRO E TOTAL DE RESERVAS DO USUARIO

include('../../FUNCIONALIDADES/USER/protect.php');
$var = $_GET['codigo'];
include('../conn.php');
$SQL = "SELECT * FROM livros WHERE cod = '$var'";
$result = $conn->query($SQL);

if($_SESSION['validacao'] != "1"){
  $RM = $_SESSION["RM"];
  $SQL2 = "SELECT * FROM user WHERE RM = '$RM'";
  $result2 = $conn->query($SQL2);
  if ($result2->num_rows > 0) {
  while ($linha2 = $result2->fetch_assoc()) {
    $Reserva = $linha2['Reserva'];
  }
}
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EVF-Bibliotech</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../css/mainLivroInfo.css">
  <link rel="stylesheet" href="../css/mainAvaliacao.css">
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
  <!-- INFORMAÇÕES DO LIVRO -->
  <?php
  if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
      echo ' <div class="card-wrapper">
                            <div class="card">
                              <div class="product-imgs">
                                <div class="img-display">
                                  <div class="img-showcase"> 
                                    <img src ="../../' . $linha['capa'] . '"/>
                                  </div>
                                </div>
                              </div>
                              <div class="product-content">
                                <h2 class="product-title">' . $linha['titulo'] . '</h2>
                                <div class="product-rating">';
                              
                              echo'</div>
                                <div class="product-detail">
                                  <h2>Sobre o livro: </h2>
                                  <p>' . $linha['sinopse'] . '</p>
                                  <ul>
                                    <li>Autor: <span>' . $linha['autor'] . '</span></li>
                                    <li>Genero: <span>' . $linha['generos'] . '</span></li>
                                    <li>Editora: <span>' . $linha['editora'] . '</span></li>
                                    <li>Ano de Lançamento: <span>' . $linha['ano'] . '</span></li>
                                    <li>Quantidade: <span>' . $linha['quantidade'] . '</span></li>
                                  </ul>
                                </div>';
                                $quant = $linha['quantidade'];
                                if($_SESSION['validacao'] != "1"){
                                  if($quant == 0 || $Reserva == 0){
                                    echo' <div class="purchase-info">
                                            <a href="#"><button type="button" class="btn" style="cursor: no-drop; background: lightgray">Reservar <i class="fas fa-bookmark"></i></button></a>
                                          </div>';
                                  }else{
                                    echo' <div class="purchase-info">
                                            <a href="../../FUNCIONALIDADES/USER/reserva.php?titulo='.$linha['titulo'].'&codLivro='.$linha['cod'].'"><button type="button" class="btn">Reservar <i class="fas fa-bookmark"></i></button></a>
                                          </div>';  
                                  }
                                }
                                echo'
                              </div>
                            </div>
                          </div>';
    };
  } else {
    echo "Não há resultados";
  }

  $conn->close();
  ?>
  <!-- FIM DAS INFORMAÇÕES -->
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