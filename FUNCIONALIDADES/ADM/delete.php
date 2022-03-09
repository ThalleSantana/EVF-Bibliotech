<?php

    $verfic = $_GET['delete'];
    $codigo = $_GET["cod"];
    $rm = $_GET["rm"];

    // echo "$verfic <br>";
    // echo "$codigo <br>";
    // echo "$rm <br>";



    if($verfic == "livro"){
        include('conn.php');
        $sql = "DELETE FROM livros WHERE cod = $codigo";

        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Livro Deletado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaLivros.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaLivros.php';
                    </script>";
        }

        $conn ->close();
    } if($verfic == "trabalho"){
        include('conn.php');

        $banco = 'SELECT * FROM trabalhos WHERE Cod = '.$codigo;
        $result = mysqli_query($conn, $banco);
        while ($linha = mysqli_fetch_array($result)) {
            $arquivoTrab = $linha['Link_Trab'];
        }

        $sql = "DELETE FROM trabalhos WHERE Cod = $codigo";

        if(mysqli_query($conn, $sql)){
            @unlink($arquivoTrab);
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Trabalho Deletado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaTrabalhos.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaTrabalhos.php';
                    </script>";
        }

        $conn ->close();
    } if($verfic == "sugest"){
        include('conn.php');
        $sql = "DELETE FROM sugestao WHERE Cod = $codigo";

        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Sugestão Deletada Com Sucesso');window.location.href='../../ADM/tabelas/tabelaSugestões.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaSugestões.php';
                    </script>";
        }

        $conn ->close();
    } if($verfic == "user"){
        include('conn.php');
        $sql = "DELETE FROM user WHERE RM = $rm";

        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Usuario Deletado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaUser.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaUser.php';
                    </script>";
        }

        $conn ->close();
    } if($verfic == "reserva"){
        include('conn.php');

        $banco = 'SELECT * FROM reservanalise WHERE Cod = '.$codigo;
        $result = mysqli_query($conn, $banco);
        while ($linha = mysqli_fetch_array($result)) {
            $livroCod = $linha['Cod_livro'];
            $rm = $linha['RM'];
        }

        $sql = "DELETE FROM reservanalise WHERE Cod = $codigo";
        $sql2 = "UPDATE livros SET quantidade=quantidade+1 WHERE cod = $livroCod";
        $sql3 = "UPDATE user SET Reserva=Reserva+1 WHERE RM = $rm";

        if(mysqli_query($conn, $sql)){
            if(mysqli_query($conn, $sql2)){
                if(mysqli_query($conn, $sql3)){
                    echo "  <script language='javascript' type='text/javascript'>
                                alert('Livro Recusado');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                            </script>";
                }else{
                    echo "  <script language='javascript' type='text/javascript'>
                                alert('Error: ".$sql3."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                            </script>";
                }
            }else{
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Error: ".$sql2."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                        </script>";
            }
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                    </script>";
        }

        $conn ->close();
    } if($verfic == "devol"){
        include('conn.php');

        $banco = 'SELECT * FROM reservanalise WHERE Cod = '.$codigo;
        $result = mysqli_query($conn, $banco);
        while ($linha = mysqli_fetch_array($result)) {
            $livroCod = $linha['Cod_livro'];
            $rm = $linha['RM'];
        }

        $sql = "DELETE FROM reservanalise WHERE Cod = $codigo";
        $sql2 = "UPDATE livros SET quantidade=quantidade+1 WHERE cod = $livroCod";
        $sql3 = "UPDATE user SET Reserva=Reserva+1 WHERE RM = $rm";

        if(mysqli_query($conn, $sql)){
            if(mysqli_query($conn, $sql2)){
                if(mysqli_query($conn, $sql3)){
                    echo "  <script language='javascript' type='text/javascript'>
                                alert('Livro Devolvido');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                            </script>";
                }else{
                    echo "  <script language='javascript' type='text/javascript'>
                                alert('Error: ".$sql3."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                            </script>";
                }
            }else{
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Error: ".$sql2."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                        </script>";
            }
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaReservaAnalise.php';
                    </script>";
        }

        $conn ->close();
    }

?>