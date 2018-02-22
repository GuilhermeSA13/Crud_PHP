<?php

//Pedindo acesso ao banco
require_once 'banco/config.php';

$id = (int) filter_input(INPUT_GET, 'id');

//Deleta as tarefas do banco
$stmt = $conn->prepare("DELETE FROM tarefa WHERE id=?");
$stmt->bindParam(1,$id);
$stmt->execute();

header('Location: menu_principal.php');