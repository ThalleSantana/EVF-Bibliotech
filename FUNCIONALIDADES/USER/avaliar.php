<?php
    $var = $_GET['estrela'];
    $livroCod = $_GET['codLivro'];
    include('conn.php');

    if($var == 1){
        $sql = "UPDATE avaliacao SET 1estrela=1estrela+1 WHERE cod_av = $livroCod";
        $sql2 = "UPDATE avaliacao SET total=total+1 WHERE cod_av = $livroCod";
    } else if($var == 2){
        $sql = "UPDATE avaliacao SET 2estrelas=2estrelas+1 WHERE cod_av = $livroCod";
        $sql2 = "UPDATE avaliacao SET total=total+1 WHERE cod_av = $livroCod";
    } else if($var == 3){
        $sql = "UPDATE avaliacao SET 3estrelas=3estrelas+1 WHERE cod_av = $livroCod";
        $sql2 = "UPDATE avaliacao SET total=total+1 WHERE cod_av = $livroCod";
    } else if($var == 4){
        $sql = "UPDATE avaliacao SET 4estrelas=4estrelas+1 WHERE cod_av = $livroCod";
        $sql2 = "UPDATE avaliacao SET total=total+1 WHERE cod_av = $livroCod";
    } else if($var == 5){
        $sql = "UPDATE avaliacao SET 5estrelas=5estrelas+1 WHERE cod_av = $livroCod";
        $sql2 = "UPDATE avaliacao SET total=total+1 WHERE cod_av = $livroCod";
    }

    if(mysqli_query($conn, $sql)){
        echo "Avaliado com sucesso";
        if(mysqli_query($conn, $sql2)){
            header("Location: ../../USER/paginas/livroinfo.php?codigo=$livroCod");
        }else{
            echo "Error: ".$sql2."<br>".$conn->error."<br>";
            header("Location: ../../USER/paginas/livroinfo.php?codigo=$livroCod");
        }
    }else{
        echo "Error: ".$sql."<br>".$conn->error."<br>";
        header("Location: ../../USER/paginas/livroinfo.php?codigo=$livroCod");
    }
?>