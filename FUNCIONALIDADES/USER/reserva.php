<?php
    $livro = $_GET['titulo'];
    $livroCod = $_GET['codLivro'];
    include_once('conn.php');
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y/m/d H:i:s');
    include('protect.php');

    $RM = $_SESSION["RM"];
    $SQL = "SELECT * FROM user WHERE RM = '$RM'";
    $result = $conn->query($SQL);
    if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
      $NOME = $linha['Nome'];
    }
  }

    $sql = "INSERT INTO reservanalise (Cod, RM, Cod_Livro, Nome, Livro, Dia, Emprestimo, Devolucao)
                                VALUE (NULL, '$RM', '$livroCod', '$NOME', '$livro', '$hoje', NULL, NULL)";

    $sql2 = "UPDATE livros SET quantidade=quantidade-1 WHERE cod = $livroCod";
    $sql3 = "UPDATE user SET Reserva=Reserva-1 WHERE RM = $RM";


    if(mysqli_query($conn, $sql)){
        if(mysqli_query($conn, $sql2)){
            if(mysqli_query($conn, $sql3)){
                header("Location: ../../USER/paginas/livroinfo.php?codigo=$livroCod");
            }else{
                echo "Error: ".$sql3."<br>".$conn->error."<br>";
                header("Location: ../../USER/paginas/livroinfo.php?codigo=$livroCod");
            }
        }else{
            echo "Error: ".$sql2."<br>".$conn->error."<br>";
            header("Location: ../../USER/paginas/livroinfo.php?codigo=$livroCod");
        }
    }else{
        echo "Error: ".$sql."<br>".$conn->error."<br>";
        header("Location: ../../USER/paginas/livroinfo.php?codigo=$livroCod");
    }
?>