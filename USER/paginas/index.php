<?php
    include('../conn.php');

    // VERIFICAÇÃO DE LOGIN

    if(isset($_POST['rm']) || isset($_POST['senha'])){
            $rm = $conn->real_escape_string($_POST['rm']);
            $senha = $conn->real_escape_string($_POST['senha']);

            $sql_query_user = "SELECT * FROM user WHERE RM = '$rm' LIMIT 1";
            $sql_exec = $conn->query($sql_query_user) or die("Falha na execução do código SQL: ".$conn->error);
            
            $sql_query_adm = "SELECT * FROM adm WHERE Login = '$rm' LIMIT 1";
            $sql_exec_adm = $conn->query($sql_query_adm) or die("Falha na execução do código SQL: ".$conn->error);


            $usuario = $sql_exec->fetch_assoc();
            $adm = $sql_exec_adm->fetch_assoc();

            if(password_verify($senha, $adm['Senha'])){
                if(!isset($_SESSION)){
                    session_start();
                }
                $validacao = "1";

                $_SESSION['validacao'] = $validacao;
                $_SESSION['Login'] = $adm['Login'];
                $_SESSION['Nome'] = $adm['Nome'];
                header("Location: home.php");
            }else if(password_verify($senha, $usuario['Senha'])){
                if(!isset($_SESSION)){
                    session_start();
                }
                $validacao = "2";

                $_SESSION['validacao'] = $validacao;
                $_SESSION['RM'] = $usuario['RM'];
                $_SESSION['Nome'] = $usuario['Nome'];
                header("Location: home.php");
            } else{
                echo "<script>alert('Falha ao logar! E-mail ou senha incorretos')</script>";
            }
    }
    
    // FIM DA VERIFICAÇÃO
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/mainLogin.css" />
        <link rel="shortcut icon" type="imagex/png" href="../../img/icons/logoEVF.ico">
        <title>Login</title>
    </head>
    <body>
        <!-- ABA DE LOGIN -->
        <section>
            <div class="imgBx">
                <img src="../../img/background/books-1204029_1920.jpg">
                <img class="imag" src="../../img/icons/Logo EVF-Bibliotech.png" alt="">
            </div>
            <div class="contentBx">
                <div class="formBx">
                    <h2>Login</h2>
                    <form action="" method="POST">
                        <div class="inputBx">
                            <span>RM</span>
                            <input type="text" name="rm" autocomplete="off" required>
                        </div>
                        <div class="inputBx">
                            <span>Senha</span>
                            <input type="password" name="senha" autocomplete="off" required>
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Entrar">
                        </div>
                        <div class="inputBx">
                            <p>Esqueceu a senha? <a href="esquecisenha.php">Nova Senha</a></p>
                            <p>Não tem uma conta? <a href="cadastro.php">Cadastra-se</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- FIM DA ABA DE LOGIN -->
    </body>
</html>