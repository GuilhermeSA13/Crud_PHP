<?php
session_start();

//Verificando se a sessão não está vazia;
if (!isset($_SESSION['nome'])) {
    header('Location: index.php?erro=2');
}
require_once 'banco/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/dash.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <title>Painel Principal</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="tela_dashboard.php">Painel Tarefas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul id="menu_dash" class="navbar-nav ml-auto" >
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
            <div class="col-md">
                <a href="tela_cadastra_tarefa.php"<button id="btn-cadastra"class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                        Cadastrar</button></a>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tarefa</th>
                            <th scope="col">Descrição</th>
                            <th scope ="col">Autor</th>
                            <th scope ="col">Prioridade</th>
                            <th scope ="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tabela">
                        <!--Povoando as tabelas HTML-->
                        <?php
                        $stmt = $conn->query("SELECT* FROM tarefa");
                        $stmt->execute();
                        while ($tarefa = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <td><?= $tarefa['id']; ?></td>
                                <td><?= $tarefa['nome_tarefa'];?></td>
                                <td><?= $tarefa['descricao'];?></td>
                                <td><?= $tarefa['autor'];?></td>
                                <td><?= $tarefa['prioridade'];?></td>
                                <td><?= $tarefa['status'];?></td>
                                <th scope="col"><a href="visualiza_tarefa.php?id=<?=$tarefa['id'];?>"><button id="visu" class="btn btn-success"title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                    <a href="tela_altera_tarefa.php?id=<?= $tarefa['id'];?>"><button class="btn btn-warning"title="Alterar"><i class="fa fa-exchange" aria-hidden="true"></i></button></a>
                                    <a href="deleta_tarefa.php?id=<?= $tarefa['id'];?>"><button class="btn btn-danger" title="Deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a></th>
                            <tr>    
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"></div>
        </div>
    </body>
</html>