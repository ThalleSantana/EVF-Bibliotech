<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci a Senha</title>
    <link rel="stylesheet" href="../css/mainCad.css">
    <link rel="shortcut icon" type="imagex/png" href="../../img/icons/logoEVF.ico">
</head>
<body>
    <div class="container">
        <div class="title">Esqueceu a Senha ?</div>
        <form method="POST" action="../../FUNCIONALIDADES/USER/cad.php">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">RM</span>
                    <input type="text" name="rm" placeholder="Digite seu RM" required autocomplete="off">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Digite seu email" required autocomplete="off">
                </div>
                <div class="input-box">
                    <span class="details">Nova Senha</span>
                    <input type="password" name="senha" placeholder="Digite sua nova senha" required autocomplete="off">
                </div>
                <div class="input-box">
                    <span class="details">Confirme a Senha</span>
                    <input type="password" name="senha2" placeholder="Digite sua senha novamente" required autocomplete="off">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Salvar" name="renovar">
            </div>
            <div class="inputBoxVoltar">
                <a href="index.php">
                  <input type="button" value="Voltar">
                </a>
            </div>
        </form>
    </div>
</body>
</html>