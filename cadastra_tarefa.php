<?php
require_once 'banco/config.php';
$nome_tarefa = (string) filter_input(INPUT_POST,'nome_tarefa');
$desc = (string) filter_input(INPUT_POST,'descricao');
$status = (string) filter_input(INPUT_POST,'status');
$prioridade = (int) filter_input(INPUT_POST,'prioridade');
$autor = (string) filter_input(INPUT_POST, 'autor');

//Verifica se não tem campo vazio e caso não tenha insere no banco a tarefa
if($nome_tarefa!='' && $desc!=''){
    $stmt = $conn->prepare("INSERT INTO tarefa (nome_tarefa,descricao,status,prioridade,autor) VALUES (?,?,?,?,?)");
    $stmt->bindParam(1,$nome_tarefa);
    $stmt->bindParam(2,$desc);
    $stmt->bindParam(3,$status);
    $stmt->bindParam(4,$prioridade);
    $stmt->bindParam(5,$autor);
    $stmt->execute();   
    header('Location: menu_principal.php');
}