<?php

session_start();
include_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css" >
    <title>Crud- Lista</title>
</head>
<body>
    <h1>Lista Usúarios</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);

        }
            //para pesquisar no banco de dados
            $result_usuarios = "SELECT * FROM usuario";
            $resultado_usuarios= mysqli_query($conn, $result_usuarios); //resultados de busca joga dentro da variavel

            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID: " .$row_usuario ['id']. "<br> <hr>";
                echo "Nome: " .$row_usuario ['nome']. "<br>";
                echo "E-mail: " .$row_usuario ['email']. "<br>";

            }//imprimir valor 
    ?>
<br>
            <button>
            
            <a href="index.php">Listar</a>
            
        
            </button>
<!-- 10 min -->
    
</body>
</html>