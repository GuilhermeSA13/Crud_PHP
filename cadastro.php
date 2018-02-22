<?php
require_once 'banco/config.php';

$usuario = (string) filter_input(INPUT_POST, 'nome');
$email = (string) filter_input(INPUT_POST, 'email');
$senha = md5((string) filter_input(INPUT_POST, 'senha'));

//verificando se existe o email.
$consulta = $conn->prepare("select*from usuario where email=?");
$consulta->bindParam(1,$email);
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);
$emailexiste=false;
if(isset ($resultado['email'])){
    $emailexiste=true;
} if($emailexiste){
    $retorno_get= 'erro_email=1';
    header('Location: tela_cadastro.php?'.$retorno_get);
    die();
}
 if($usuario !='' && $email!=''&& $senha!=''){
         $stmt = $conn->prepare("insert into usuario(nome,email,senha) values(?,?,?)");
         $stmt->bindParam(1,$usuario);
         $stmt->bindParam(2,$email);
         $stmt->bindParam(3,$senha);
         $stmt->execute();
         header('Location:index.php');
         
     }else{
              $erro_usuario = 'erro_usuario=1';
              header('Location: tela_cadastro.php?'.$erro_usuario);
     }
