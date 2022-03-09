<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['validacao'])){
        echo "  <script language='javascript' type='text/javascript'>
                    alert('Você não pode acessar essa pagina');window.location.href='../../USER/paginas/index.php';
                </script>";
    }
?>