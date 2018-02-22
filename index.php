<?php

//Possiveis erros 
$erro = isset($_GET['erro'])?$_GET['erro']:0;
$success = isset($_GET['success'])?$_GET['success']:0;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="js/index.js"></script>
        <title>Gerenciamento de tarefas</title>
    </head>
    <body>
        <div id="index_principal">
            <h1 id="titulo">Painel Administrativo</h1>
            <div id="div_form">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <form action="validar_login.php" method="post">
                    <input type="text" name="usuario" id="usuario" placeholder="Usuário"><br><br>
                    <input type="password" name="senha" id="senha" placeholder="Senha"><br><br>
                    <button type="submit" class="btn btn-secondery" id="btn-login">Entrar</button>
                    <a href="tela_cadastro.php"><button type="button" class="btn btn-primary"id="btn-cadastra">Cadastre-se</button></a>
                </form>
                <?php
                //Caso ocorra esse erros possiveis mensagens ao usuário
                if($erro==1){
                    echo"<p class='erro'> Usuário e/ou senha inválidos</p>";
                }if($erro==2){
                    echo"<p class='erro'> Por favor. Fazer o login novamente. </p>";
                    //Mensagem de saida.
                }if($success==1){
                    echo "<p class='success'>Aguardamos sua visita novamente</p>";
                }
                ?>
                </div>
        </div>
    </body>
</html>