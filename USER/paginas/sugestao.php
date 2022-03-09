<?php
  include('../../FUNCIONALIDADES/USER/protect.php');
  include('../conn.php');
  $RM = $_SESSION["RM"];
  $SQL = "SELECT * FROM user WHERE RM = '$RM'";
  $result = $conn->query($SQL);
  if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
      $NOME = $linha['Nome'];
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
  <link rel="stylesheet" href="../css/mainSugestao.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="shortcut icon" type="imagex/png" href="../../img/icons/logoEVF.ico">
</head>

<body>
  <div class="contactUs">
    <div class="title">
      <h2>Sugestões de Livros</h2>
    </div>
    <div class="box">
      <div class="contact form">
        <h3>Dê sua Sugestão</h3>
        <form method="POST" action="../../FUNCIONALIDADES/ADM/add.php">
          <div class="formBox">
            <div class="row50">
              <div class="inputBox">
                <span>RM</span>
                <input type="text" name="rm" value="<?php echo $RM?>" readonly class="cursor">
              </div>
              <div class="inputBox">
                <span>Nome</span>
                <input type="text" name="nome" value="<?php echo $NOME?>" readonly class="cursor">
              </div>
            </div>
            <div class="row50">
              <div class="inputBox">
                <span>Titulo do Livro</span>
                <input type="text" name="titulo" placeholder="O Pequeno Príncipe" autocomplete="off">
              </div>
              <div class="inputBox">
                <span>Autor do Livro</span>
                <input type="text" name="autor" placeholder="Antoine de Saint-Exupéry" autocomplete="off">
              </div>
            </div>
            <div class="row100">
              <div class="inputBox">
                <span>Breve Sinopse</span>
                <textarea placeholder="Escreva a sinopse aqui..." name="sinopse"></textarea>
              </div>
            </div>
            <div class="row100">
              <div class="inputBox">
                <input type="submit" value="Enviar" name="adicionarSuges">
              </div>
              <div class="inputBoxVoltar">
                <a href="home.php">
                  <input type="button" value="Voltar">
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>