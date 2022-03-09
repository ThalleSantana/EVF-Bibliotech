<?php
$var = $_GET['codigo'];
include('../conn.php');
$SQL = "SELECT * FROM sugestao WHERE Cod = '$var'";
$result = $conn->query($SQL);
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
  <link rel="stylesheet" href="../css/navbar.css">
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
              <li><a href="tabelaLivros.php">Livros</a></li>
              <li><a href="tabelaReservaAnalise.php">Reservas</a></li>
              <li><a href="tabelaSugestões.php">Sugestões</a></li>
              <li><a href="tabelaTrabalhos.php">Trabalhos</a></li>
              <li><a href="tabelaUser.php">Usuarios</a></li>
            </ul>
          </li>
          <li><a href="../../FUNCIONALIDADES/USER/sair.php">Sair</a></li>
        </ul>
      </div>
      <label for="show-search" id="ocultar" class="search-icon"><a href="../../USER/paginas/pesquisar.php"><i class="fas fa-search"></i></a></label>
    </nav>
  </div>
  <!--FIM NAVBAR-->
  <?php
  if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
      echo ' <div class="card-wrapper">
                            <div class="card">
                              <div class="product-imgs">
                                <div class="img-display">
                                  <div class="img-showcase"> 
                                    <img src ="../../img/icons/image-gallery.png"/>
                                  </div>
                                </div>
                              </div>
                              <div class="product-content">
                                <h2 class="product-title">'.$linha['Titulo_Livro'].'</h2>
                                <div class="product-detail">
                                  <h2>Sobre o Trabalho: </h2>
                                  <p>' . $linha['Sinopse_Livro'] . '</p>
                                  <ul>
                                    <li>Autor: <span>' . $linha['Autor_Livro'] . '</span></li>
                                    <li>RM do Aluno: <span>' . $linha['RM'] . '</span></li>
                                    <li>Aluno: <span>' . $linha['Nome'] . '</span></li>
                                  </ul>
                                </div>
                                <div class="purchase-info">
                                  <a href="../tabelas/tabelaSugestões.php"><button type="button" class="btn">Voltar <i class="fas fa-undo"></i></button></a>
                                </div>
                              </div>
                            </div>
                          </div>';
    };
  } else {
    echo "Não há resultados";
  }

  $conn->close();
  ?>
</body>

</html>