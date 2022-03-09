<?php
    include_once('conn.php');
    if (isset($_POST['alterarLivro'])) {
        $cod = $_GET['codigo'];
        $capa = $_POST["capa"];
        $titulo = $_POST["titulo"];
        $sinopse = $_POST["sinopse"];
        $autor = $_POST["autor"];
        $genero = $_POST["genero"];
        $editora = $_POST["editora"];
        $ano = $_POST["ano"];
        $quant = $_POST["quant"];

        $sql = "UPDATE livros SET titulo='$titulo', sinopse='$sinopse', generos='$genero', autor='$autor', editora='$editora', ano='$ano',quantidade='$quant', capa='$capa' WHERE cod='$cod'";

        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Livro Alterado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaLivros.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/alterar/alterarLivro.php?codigo=".$cod."';
                    </script>";
        }
    }if (isset($_POST['alteraruser'])){
        $rm = $_GET['rm'];
        $nome = $_POST["nome"];
        $serie = $_POST["serie"];
        $curso = $_POST["curso"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        $sql = "UPDATE user SET Nome='$nome', Serie='$serie', Curso='$curso', Email='$email', Celular='$celular' WHERE RM='$rm'";

        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Cadastro Alterado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaUser.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/alterar/alterarUser.php?rm=".$rm."';
                    </script>";
            header("Location: ../../ADM/alterar/alterarUser.php");
        }
    }if (isset($_POST['alterartrab'])){
        $cod = $_GET['cod'];
        $nome = $_POST["nomeTrab"];
        $sinopse = $_POST["sinopse"];
        $autor = $_POST["autor"];
        $tipo = $_POST["tipo"];
        $ano = $_POST["ano"];
        $link = $_POST["link"];

        $sql = "UPDATE trabalhos SET Nome_Trab='$nome', Tipo_Trab='$tipo', Autor_Trab='$autor', Sinopse_Trab='$sinopse', Ano_Trab='$ano', Link_Trab='$link' WHERE Cod='$cod'";

        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Trabalho Alterado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaTrabalhos.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/alterar/alterarTrabalho.php?codigo=".$cod."';
                    </script>";
        }
    }
?>