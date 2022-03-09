<?php
	//Incluir a conexão com banco de dados
	include_once('../conn.php');
	
	//Recuperar o valor da palavra
	$titulo = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$titulo = "SELECT * FROM livros WHERE titulo LIKE '%$titulo%'";
	$resultado_titulo = mysqli_query($conn, $titulo);
	
	if(mysqli_num_rows($resultado_titulo) <= 0){
		echo "Nenhum livro encontrado...";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_titulo)){
			echo '
                <div class="swiper-slide">
                    <a href="livroinfo.php?codigo=' . $rows['cod'] . '">
                        <div class="slider-box">
                            <div class="img-box"> 
                                <img class="item" src ="../../' . $rows['capa'] . '"/>
                            </div>
                            <p class="detail">
                                ' . $rows['titulo'] . '
                                <br>
                                Gêneros: ' . $rows['generos'] . '
                            </p>
                            <div class="cart">
                                Ler Mais
                            </div>
                        </div>
                    </a>
                </div>
          ';
		}
	}
?>