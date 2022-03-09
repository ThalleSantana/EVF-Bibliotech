<?php
  include('../../FUNCIONALIDADES/USER/protect.php');
  if($_SESSION['validacao'] != "1"){
    echo "  <script language='javascript' type='text/javascript'>
              alert('Você não pode acessar essa pagina');window.location.href='../../USER/paginas/index.php';
            </script>";
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>EVF-Bibliotech</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../css/navbar.css">
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
  <h1>.</h1>
  <table>
    <caption>Tabela de Livros</caption>
    <caption class="addLivro"><a href="../adicionar/adicionarLivro.php"><button type="button" class="btn">Adicionar Livro <i class="fas fa-plus-circle"></i></button></a></caption>
    <thead>
      <tr>
        <th>Cód</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Ano Lançamento</th>
        <th>Quantidade</th>
        <th>Alterar</th>
        <th>Visualizar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <?php
      include('../conn.php');
      $results_per_page = 25;
      $sql = 'SELECT * FROM livros';
      $result = mysqli_query($conn, $sql);
      $number_of_results = mysqli_num_rows($result);
      $number_of_pages = ceil($number_of_results / $results_per_page);
      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
      $this_page_first_result = ($page - 1) * $results_per_page;
      $sql = 'SELECT * FROM livros LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
      $result = mysqli_query($conn, $sql);
      while ($linha = mysqli_fetch_array($result)) {
        echo '  <tr>
                  <td>' . $linha['cod'] . '</td>
                  <td>' . $linha['titulo'] . '</td>
                  <td>' . $linha['autor'] . '</td>
                  <td>' . $linha['editora'] . '</td>
                  <td>' . $linha['ano'] . '</td>
                  <td>' . $linha['quantidade'] . '</td>
                  <td><a href="../alterar/alterarLivro.php?codigo=' . $linha['cod'] . '"><i class="far fa-edit"></a></td>
                  <td><a href="../visualizar/visualizarLivro.php?codigo=' . $linha['cod'] . '"><i class="fas fa-eye"></a></td>
                  <td><a onclick="exclui('.$linha['cod'].')" href="#"><i class="fas fa-trash-alt"></a></td>
                </tr>';
      };
      echo '</table>';
      echo '<div class="pagination">';
      for ($page = 1; $page <= $number_of_pages; $page++) {
        echo '<a href="tabelaLivros.php?page=' . $page . '" class="btn">' . $page . '</a>';
      }
      echo '</div>';
    ?>

  <script>
    function exclui(cod){
      if(confirm("Deseja excluir o Livro com Código " + cod + "?")){
        location.href='../../FUNCIONALIDADES/ADM/delete.php?cod=' + cod + '&delete=livro';
      }
    }
  </script>
</body>

</html>