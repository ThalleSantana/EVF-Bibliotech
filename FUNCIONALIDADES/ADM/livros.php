<?php
    include_once('conn.php');
    $var = $_GET['cod'];
    date_default_timezone_set('America/Sao_Paulo');
    $hoje = date('Y/m/d');
    $entrega = date('Y/m/d', strtotime('+7 days'));

    $sql = "UPDATE reservanalise SET Emprestimo='$hoje', Devolucao='$entrega', Confirm=1 WHERE Cod='$var'";

    if(mysqli_query($conn, $sql,)){
        echo "  <script language='javascript' type='text/javascript'>
                    alert('Emprestimo Realizado');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                </script>";
    }else{
        echo "  <script language='javascript' type='text/javascript'>
                    alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                </script>";
    }

    /* COLOCAR SISTEMA DE EMAIL EM RELAÇÃO AO EMPRESTIMO AQ */
    // $var = $_GET['Cod'];
    
    // $sql = "UPDATE reservanalise SET Emprestimo=NULL, Devolucao=NULL WHERE Cod='$var'";

    // if(mysqli_query($conn, $sql)){
    //     header("Location: ../tabelaReservaAnalise.php");
    // }else{
    //     echo "Error: ".$sql."<br>".$conn->error."<br>";
    //     header("Location: livros.php");
    // }

?>