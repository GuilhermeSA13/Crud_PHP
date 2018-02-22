<?php

require_once 'banco/config.php';

$id = (int) filter_input(INPUT_POST, 'id_tarefa');
$nome_tarefa = (string) filter_input(INPUT_POST, 'nome_tarefa');
$desc = (string) filter_input(INPUT_POST,'descricao');
$status = (string) filter_input(INPUT_POST, 'status');
$prioridade = (int) filter_input(INPUT_POST,'prioridade');
$autor= (string) filter_input(INPUT_POST, 'autor');

// Altera a os dados das tarefas 
if($nome_tarefa!=''&& $desc!=''){
    $stmt = $conn->prepare("UPDATE tarefa SET nome_tarefa=?,descricao=?,autor=?,status=?,prioridade=? WHERE id=?");
    $stmt->bindParam(1,$nome_tarefa);
    $stmt->bindParam(2,$desc);
    $stmt->bindParam(3,$autor);
    $stmt->bindParam(4,$status);
    $stmt->bindParam(5,$prioridade);
    $stmt->bindParam(6,$id);
    $stmt->execute();
    
    header("Location:menu_principal.php");
}else{
    header("Location:tela_altera_tarefa.php?id=".$id."&erro_tarefa=1");
}
    