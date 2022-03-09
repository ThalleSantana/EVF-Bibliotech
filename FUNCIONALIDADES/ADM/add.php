<?php
    include_once('conn.php');
    if(isset($_POST['adicionarLivro'])){
        $capa = $_POST['capa'];
        $titulo = $_POST['titulo'];
        $sinopse = $_POST['sinopse'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $editora = $_POST['editora'];
        $ano = $_POST['ano'];
        $quant = $_POST['quant'];

        $sql = "INSERT INTO livros (cod, titulo, sinopse, generos, autor, editora, ano, quantidade, capa)
                VALUE (NULL, '$titulo', '$sinopse', '$genero', '$autor', '$editora', '$ano', '$quant', '$capa')";
        
        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Livro Adicionado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaLivros.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/adicionar/adicionarLivro.php';
                    </script>";
        }
    } if(isset($_POST['adicionarTrab'])){
        
        $nome = $_POST['nomeTrab'];
        $sinopse = $_POST['sinopse'];
        $autor = $_POST['autor'];
        $tipo = $_POST['tipo'];
        $ano = $_POST['ano'];
        $link = $_FILES['link'];
        var_dump($link = $_FILES['link']);

        if($link['error']){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Falha ao enviar arquivo')';
                    </script>";
        }
        $pasta = "arquivos/";
        $nomeDoArquivo = $link['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
            
        $deu_certo = move_uploaded_file($link["tmp_name"],$pasta.$novoNomeDoArquivo.".".$extensao);
        var_dump($deu_certo);
        if($deu_certo){
            echo "<p>Arquivo enviado com sucesso!</p>";
        }else{
            echo "<p>Falha ao enviar o arquivo</p>";
        }

        $path = $pasta.$novoNomeDoArquivo.".".$extensao;
        $sql = "INSERT INTO trabalhos (Cod, Nome_Trab, Tipo_Trab, Autor_Trab, Sinopse_Trab, Ano_Trab, Link_Trab)
                                VALUE (NULL, '$nome', '$tipo', '$autor', '$sinopse', '$ano', '$path')";
        
        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Trabalho Adicionado Com Sucesso');window.location.href='../../ADM/tabelas/tabelaTrabalhos.php';
                    </script>";
            
        }else{
             echo "  <script language='javascript' type='text/javascript'>
                        alert('Error: ".$sql."<br>".$conn->error."');window.location.href='../../ADM/adicionar/adicionarTrabalho.php';
                    </script>";
        }
    } if(isset($_POST['adicionarSuges'])){
        $rm = $_POST['rm'];
        $nome = $_POST['nome'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $sinopse = $_POST['sinopse'];
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y/m/d H:i:s');

        $sql = "INSERT INTO sugestao (Cod, RM, Nome, Titulo_Livro, Autor_Livro, Sinopse_Livro, Dia)
                                VALUE (NULL, '$rm', '$nome', '$titulo', '$autor', '$sinopse', '$hoje')";
        
        if(mysqli_query($conn, $sql)){
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Sugestão Feita com sucesso');window.location.href='../../USER/paginas/home.php';
                    </script>";
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                        alert('Erro ao realizar a sugestão');window.location.href='../../USER/paginas/sugestao.php';
                    </script>";
        }
    } if(isset($_POST['ADM'])){
        $login = $_POST['login'];
        $nome = $_POST['nome'];
        $senha1 = $_POST['senha1'];
        $senha2 = $_POST['senha2'];

        if($senha1 === $senha2){
            $senha = $senha1;
            $salto = ['cost'=>'8'];
            $hash = password_hash($senha,PASSWORD_BCRYPT,$salto);

            $sql = "INSERT INTO adm (Login, Nome, Senha)
                    VALUE ('$login', '$nome', '$hash')";
        
            if(mysqli_query($conn, $sql)){
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Cadastrado com sucesso');window.location.href='../../ADM/tabelas/tabelaADM.php';
                        </script>";
            }else{
                echo "  <script language='javascript' type='text/javascript'>
                            alert('Error: ".$sql."<br>".$conn->error."<br>');window.location.href='../../ADM/adicionar/adicionarADM.php';
                        </script>";
            }
        }else{
            echo "  <script language='javascript' type='text/javascript'>
                            alert('Senhas diferentes');window.location.href='../../ADM/adicionar/adicionarADM.php';
                    </script>";
        }
    }
?>