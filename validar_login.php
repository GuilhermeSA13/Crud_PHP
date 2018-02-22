<?php
session_start();
require_once 'banco/config.php';

//Pegando os dados através do POST;
$usuario = (string) filter_input(INPUT_POST, 'usuario');
$senha = md5((string) filter_input(INPUT_POST, 'senha'));

// Fazendo a busca no banco de dados;
$stmt = $conn->prepare("SELECT * FROM usuario WHERE nome=? AND senha=?");
$stmt->bindParam(1,$usuario);
$stmt->bindParam(2,$senha);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

//Verificando se os dados digitados batem com alguma linha do banco e dando acesso o redirecionando para página inicial;
if(isset($resultado['nome'])){
    $_SESSION['nome']= $resultado['nome'];
    $_SESSION['email']= $resultado['email'];
    $_SESSION['id']= $resultado['id'];
    
    
    header('Location: menu_principal.php');
}else{
    header('Location: index.php?erro=1');
}



