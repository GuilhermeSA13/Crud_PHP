<?php
session_start();

//Verificando se a sessao não está vazia;

if (!isset($_SESSION['nome'])) {
    header("Location:index.php?erro=2");
}
// pedindo acesso ao banco de dados.
require_once 'banco/config.php';

$id = (int) filter_input(INPUT_GET, 'id');
$sql = ("SELECT * FROM tarefa WHERE id=" . $id);

// trazendo todos os dados para ser mostrados na tela.
foreach ($conn->query($sql) as $tarefa) {
    
}
$erro_tarefa = isset($_GET['erro_tarefa'])?$_GET['erro_tarefa']:0;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/tela_altera_tarefa.css"
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <title>Cadastra Tarefas</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="mrnu_principal.php">Painel Tarefas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item">
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
        <h1 id="titulo">Alteração de tarefas</h1>
        <div class="container">
            <div class="altera_principal">
                <form action="altera_tarefa.php" method="POST">
                    <label for="nome_tarefa">Titulo:</label><input type="text" name="nome_tarefa" id="nome_tarefa" value="<?= $tarefa['nome_tarefa']; ?>"><br>
                    <label for="prioridade">Prioridade:</label><select name="prioridade" id="prioridade">
                        <option selected value="<?= $tarefa['prioridade']; ?>"><?= $tarefa['prioridade']; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label for="status">Status:</label><select name="status" id="status">
                        <option selected value="<?= $tarefa['status']; ?>"><?= $tarefa['status']; ?></option>
                        <option value="Não iniciada">Não iniciada</option>
                        <option value="Processada">Processada</option>
                        <option value="Finalizada">Finalizada</option>
                    </select><br>
                    <label for="autor">Autor da tarefa:</label><input name="autor" id="autor" type="text" readonly="true" value="<?= $tarefa['autor'] ?>"><br>
                    <label for="desc_tarefa">Descrição:</label>
                    <textarea resize="none" name="descricao" id="descricao"><?= $tarefa['descricao'] ?></textarea>
                    <input type="hidden" name="id_tarefa" readonly id="id_tarefa" value="<?= (int) filter_input(INPUT_GET, 'id') ?>">
                    <?php
                    if($erro_tarefa==1){
                        echo "<p class='erro_tarefa'>Tarefa não alterada. Favor certificar-se que não existe nenhum campo vazio </p>";
                    }
                    ?>
                    <button type="submit" class="botao btn btn-success col-md-5">Alterar</button>
                    <a href="menu_principal.php"><button type="button" class=" botao btn btn-danger col-md-5">Voltar</button></a>
                </form>
            </div>

        </div>
    </body>
</html>