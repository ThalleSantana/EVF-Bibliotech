<?php

    $verfic = $_GET['verif'];

    if($verfic == "recusar"){
        $rm = $_GET["rm"];
        include('conn.php');

        $sql = "SELECT * FROM useranalise WHERE RM = '$rm'";
        $result = mysqli_query($conn, $sql);
            while ($linha = mysqli_fetch_array($result)) {
                $nome = $linha['Nome'];
                $serie = $linha['Serie'];
                $curso = $linha['Curso'];
                $email = $linha['Email'];
            }

        $msg = "Venho comunicar que alguma dessas informações apresenta incoerência com as informações registradas na escola: '$nome', '$serie', '$curso'. Por esse motivo, sua conta foi recusada, peço que cadastra-se novamente em nosso site.";
        date_default_timezone_set('America/Sao_Paulo');
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');

        $arquivo = "
            <html>
                <p><b>Mensagem: </b>$msg</p>
                <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
            </html>
        ";

        $email2 = "evfbibliotech@gmail.com";
        $assunto = "Incoerência nas Informações Regestradas";

        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: EVF-Bibliotech";

        mail($email, $assunto, $arquivo, $headers);

        $sql = "DELETE FROM useranalise WHERE RM = $rm";

        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Usuario Recusado');window.location.href='../../ADM/tabelas/tabelaUser.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/tabelas/tabelaUser.php';
                    </script>";
        }

        $conn ->close();

    } if($verfic == "aceitar"){
        $rm = $_GET["rm"];
        include('conn.php');

        $sql = "SELECT * FROM useranalise WHERE RM = '$rm'";
        $result = mysqli_query($conn, $sql);
            while ($linha = mysqli_fetch_array($result)) {
                $nome = $linha['Nome'];
                $email = $linha['Email'];
            }

        $msg = "Venho comunicar que você, <b>$nome</b>, pode utilizar o nosso site sem nenhum problema.";
        date_default_timezone_set('America/Sao_Paulo');
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');

        $arquivo = "
            <html>
                <p><b>Mensagem: </b>$msg</p>
                <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
            </html>
        ";

        $email2 = "evfbibliotech@gmail.com";
        $assunto = "Conta Aceita";

        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: EVF-Bibliotech";

        mail($email, $assunto, $arquivo, $headers);
        
        mysqli_query($conn, "INSERT INTO user (RM, Nome, Serie, Curso, Email, Celular, Senha) SELECT RM, Nome, Serie, Curso, Email, Celular, Senha From useranalise WHERE RM = $rm");
        mysqli_query($conn, "DELETE FROM useranalise WHERE RM = $rm");

        echo "  <script language='javascript' type='text/javascript'>
                    alert('Usuario Aceito');window.location.href='../../ADM/tabelas/tabelaUser.php';
                </script>";
        $conn ->close();

    } if($verfic == "aviso"){
        $cod = $_GET["cod"];
        include('conn.php');

        $sql = "SELECT * FROM reservanalise WHERE Cod = '$cod'";
        $result = mysqli_query($conn, $sql);
            while ($linha = mysqli_fetch_array($result)) {
                $nome = $linha['Nome'];
                $livro = $linha['Livro'];
                $devol = $linha['Devolucao'];
            }
        $sql2 = "SELECT * FROM user WHERE RM = '$rm'";
            while ($linha = mysqli_fetch_array($result)) {
                $email = $linha['Email'];
            }

        $msg = "Venho lebrar para você, <b>$nome</b>, que o prazo para a devolução ($devol) do livro '$livro' está acabando.";
        date_default_timezone_set('America/Sao_Paulo');
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');

        $arquivo = "
            <html>
                <p><b>Mensagem: </b>$msg</p>
                <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
            </html>
        ";

        $email2 = "evfbibliotech@gmail.com";
        $assunto = "Lembrete sobre o Prazo de Devolução";

        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: EVF-Bibliotech";

        mail($email, $assunto, $arquivo, $headers);
        
        echo "<meta http-equiv='refresh' content='10;URL=../../ADM/tabelas/tabelaUserAnalise.php'>";
    }

?>