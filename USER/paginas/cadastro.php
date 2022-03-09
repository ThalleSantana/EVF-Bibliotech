<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/mainCad.css">
    <link rel="shortcut icon" type="imagex/png" href="../../img/icons/logoEVF.ico">
</head>
<body>
    <!-- FORMULARIO DE CADASTRO -->
    <div class="container">
        <div class="title">Cadastro</div>
        <form method="POST" action="../../FUNCIONALIDADES/USER/cad.php">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">RM</span>
                    <input type="text" name="rm" placeholder="Digite seu RM" required autocomplete="off">
                </div>
                <div class="input-box">
                    <span class="details">Nome Completo</span>
                    <input type="text" name="nome" placeholder="Digite seu nome" required autocomplete="off">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Digite seu email" required autocomplete="off">
                </div>
                <div class="input-box">
                    <span class="details">Celular</span>
                    <input type="text" name="celular" placeholder="Digite seu celular" required autocomplete="off">
                </div>
                <div class="gender-details">
                    <input type="radio" name="serie" value="1º" id="dot-1" required>
                    <input type="radio" name="serie" value="2º" id="dot-2" required>
                    <input type="radio" name="serie" value="3º" id="dot-3" required>
                    <span class="details">Série</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">1º</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">2º</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender tres">3º</span>
                        </label>
                    </div>
                </div>
                <div class="input-box">
                    <span class="details">Curso</span>
                    <input type="text" name="curso" list="colorList" autocomplete="off" placeholder="Selecione o seu curso" required>
                        <datalist id="colorList">
                            <option>Administração</option>
                            <option>Desenvolvimento de Sistemas</option>
                            <option>Design Gráfico</option>
                            <option>Informatica</option>
                            <option>Recursos Humanos</option>
                        </datalist>
                </div>
                <div class="input-box">
                    <span class="details">Senha</span>
                    <input type="password" name="senha" placeholder="Digite sua senha" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirme a Senha</span>
                    <input type="password" name="senha2" placeholder="Digite seu senha novamente" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" name="cadastrar" value="Cadastrar">
            </div>
            <div class="inputBoxVoltar">
                <a href="index.php">
                  <input type="button" value="Voltar">
                </a>
            </div>
        </form>
    </div>
    <!-- FIM FORMULARIO DE CADASTRO -->
</body>
</html>