<?php

session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css" >
    <title>Crud- Cadastrar</title>
</head>
<body>
    <h1>Cadastrar Usúarios</h1>
    <?php
        if(isset($_SESSION['msg']))
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
    ?>

    <form method="POST" action="processa.php">
        <label> Nome:</label>
        <input type="text" name="nome"  placeholder= "Digite se nome completo"><br><br>
    
        <label >Email</label>
        <input type="email" name="email" placeholder= "Digite seu email"><br><br>

        <input type="submit" value= Cadastrar>
    </form>
    
    <button>
    <a href="lista.php">Listar</a>
            
            </button>


</body>
</html>