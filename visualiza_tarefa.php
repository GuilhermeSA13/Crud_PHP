<?php
session_start();

require_once 'banco/config.php';
//verificando se a sessão não está vazia;

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
}
//Pegando o id através do GET
$id = (int) filter_input(INPUT_GET, 'id');
$sql = ("SELECT*FROM tarefa where id=" . $id);

// Para trazer todos os campos das tabelas
foreach ($conn->query($sql) as $tarefa) {
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/tela_visualiza_tarefa.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">        
        <title>Visualizar <?= $tarefa['nome_tarefa'] ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="menu_principal.php">Painel Tarefas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><?= $_SESSION['nome'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= $_SESSION['email'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="col-md-10 divs esq">
                <h1 class="titulo prin"><?= $tarefa['nome_tarefa'] ?></h1>
            </div>
            <div class=" status col-md-2 divs dir">
                <h4 class="">Status:</h4>
                <h5><?= $tarefa['status'] ?></h5>
            </div>
            <div class=" status col-md-2 divs dir">
                <h4 class="">Criada por:</h4>
                <h5><?= $tarefa['autor'] ?></h5>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="col-md-8 divs esq">
            <h4>Descrição:</h4>
            <p id="desc_txt"><?= $tarefa['descricao'] ?></p>
        </div>
        <div class="col-md-4 divs dir">                
        </div>
        <a href="menu_principal.php"><button type="button" class="botao btn btn-primary btn-lg btn-block">Voltar</button></a>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>
</html>