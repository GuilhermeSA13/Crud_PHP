<?php
//Aviso de possiveis erros para o  usuário.
$erro_email=isset($_GET['erro_email']) ? $_GET['erro_email']:0;
$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario']:0;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/cadastro.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <script>
        </script>
        <title>Cadastre-se</title>
    </head>
    <body>
        <div id="cadastra_principal">
            <h1 id="titulo">Cadastre-se</h1>
            <div id="div_form">
                <form action="cadastro.php" method="post">
                    <input type="text" name="nome" id="nome" placeholder="Nome"><br><br>
                    <input type="email" name="email" id="email"placeholder="Email"><br>
                    <br>
                    <input type="password" name="senha" id="senha" placeholder="Senha"><br><br>
                    <button type="submit" id="btn-cadastra" class="btn btn-primary">Cadastrar</button>
                    <a href="index.php"><button type="button" class="btn">Voltar</button></a>
                </form>
                <?php
                // caso a verificação acima seja correta mensagens ao usuário;
                    if($erro_email){
                        echo"<p class='erro'> E-mail já cadastrado. Por favor tente outro.</p>";
                    }if($erro_usuario){
                        echo "<p class='erro'> Erro ao cadastrar usuário.</p>";
                    }
                ?>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/cadastra.js"></script>   
    </body>
</html>