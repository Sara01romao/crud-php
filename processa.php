<?php
session_start();

include_once("conexao.php");//conexão com banco


//receber dados do formulario
//------------metodo+   nome do campo+ filtro para limpa os dados quem do formulario  
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );

/* teste para ver se esta enviando os date
echo "Nome: $nome <br>" ;
echo "E-mail: $email <br>";*/



// INSERIR
$result_usuario= "INSERT INTO usuario (nome, email, created) VALUES('$nome', '$email', NOW())";
$resulto_usuario=mysqli_query ($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style= 'color: green'>Usuário cadastrado com sucesso</p>";
    header ("Location: index.php");
}else{
    $_SESSION['msg'] = "<p style= 'color: red'>Usuário não foi cadastrado com sucesso</p>";

    header("Location: index.php");
}
?>