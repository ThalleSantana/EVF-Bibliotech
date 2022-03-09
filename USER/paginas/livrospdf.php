<?php
// VERIFICAÇÃO DE LOGIN
include('../../FUNCIONALIDADES/USER/protect.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EVF-Bibliotech</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../css/mainPDF.css">
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
  <!-- BANNER -->
  <div class="banner container">
      <div class="title">
        <h2> Sites com livros PDF</h2>
        <h3> Sabemos que os livros PDF gratuitos às vezes podem ser difíceis de encontrar, ou você simplesmente não tem tempo para reunir vários sobre o mesmo tópico para sua biblioteca. Por este motivo, disponibilizamos alguns sites onde você pode baixar diversos livros PDF sem nenhum problema, pois são sites legalizados.</h3>
      </div>
    </div>
  <!-- FIM BANNER -->
  <!-- SITES PDFs -->
  <div class="area-container">
    <div class="area">
      <a href="https://www.gutenberg.org/browse/languages/pt">
        <div class="area-itens">
          <div class="itens-box">
            <div class="logo-img">
              <img src="../../img/icons/logo-PG.png">
            </div>
            <a href="https://www.gutenberg.org/browse/languages/pt">Project Gutenburg</a>
          </div>
        </div>
      </a>
      <a href="https://www.instituto-camoes.pt/activity/servicos-online/biblioteca-digital">
        <div class="area-itens">
          <div class="itens-box">
            <div class="logo-img">
              <img src="../../img/icons/logo-ICCLP.png">
            </div>
            <a href="https://www.instituto-camoes.pt/activity/servicos-online/biblioteca-digital">Instituto Camões</a>
          </div>
        </div>
      </a>
      <a href="http://www.dominiopublico.gov.br/pesquisa/PesquisaObraForm.jsp">
        <div class="area-itens">
          <div class="itens-box">
            <div class="logo-img">
              <img src="../../img/icons/logo-PDP.png">
            </div>
            <a href="http://www.dominiopublico.gov.br/pesquisa/PesquisaObraForm.jsp">Portal Dominio Publico</a>
          </div>
        </div>
      </a>
      <a href="https://www.wdl.org/pt/">
        <div class="area-itens">
          <div class="itens-box">
            <div class="logo-img">
              <img src="../../img/icons/logo-BDM.png">
            </div>
            <a href="https://www.wdl.org/pt/">Biblioteca Digital Mundial</a>
          </div>
        </div>
      </a>
    </div>
  </div>
  <!-- FIM SITES PDFs -->
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