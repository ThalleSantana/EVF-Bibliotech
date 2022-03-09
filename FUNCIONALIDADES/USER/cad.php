<?php
    include_once('conn.php');
    if(isset($_POST['cadastrar'])){
        $rm = $_POST['rm'];
        $nome = $_POST['nome'];
        $serie = $_POST['serie'];
        $curso = $_POST['curso'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];
        $senha1 = $_POST['senha'];
        $senha2 = $_POST['senha2'];

        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y/m/d H:i:s');

        if($senha1 === $senha2){
            $senha = $senha1;
            $salto = ['cost'=>'8'];
            $hash = password_hash($senha,PASSWORD_BCRYPT,$salto);

            $sql = "INSERT INTO useranalise (RM, Nome, Serie, Curso, Email, Celular, Senha, Dia)
                    VALUE ('$rm', '$nome', '$serie', '$curso', '$email', '$celular', '$hash', '$hoje')";
        
            if(mysqli_query($conn, $sql)){
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Cadastrado com sucesso');window.location.href='../../USER/paginas/index.php';
                        </script>";
            }else{
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Erro, tente novamente mais tarde');window.location.href='../../USER/paginas/cadastro.php';
                        </script>";
            }
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Erro, Senhas diferentes, Tente novamente');window.location.href='../../USER/paginas/cadastro.php';
                    </script>";
        }
        
    } if(isset($_POST['renovar'])){
        $rm = $_POST['rm'];
        $email = $_POST['email'];
        $senha1 = $_POST['senha'];
        $senha2 = $_POST['senha2'];

        if($senha1 === $senha2){
            $senha = $senha1;
            $salto = ['cost'=>'8'];
            $hash = password_hash($senha,PASSWORD_BCRYPT,$salto);

            $sql = "UPDATE user SET Senha='$hash' WHERE RM='$rm' AND Email='$email'";
        
            if(mysqli_query($conn, $sql)){
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Senha Alterada');window.location.href='../../USER/paginas/index.php';
                        </script>";
            }else{
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Erro, tente novamente mais tarde');window.location.href='../../USER/paginas/esquecisenha.php';
                        </script>";
            }
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                            alert('Erro, Senhas diferentes, Tente novamente');window.location.href='../../USER/paginas/esquecisenha.php';
                        </script>";
        }
    }
?>