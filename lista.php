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

        //paginação

       $pagina_atual= filter_input(INPUT_GET, 'pagina',FILTER_SANITIZE_NUMBER_INT); //receber variavei da nova pagina
        $pagina= (!empty($pagina_atual)) ? $pagina_atual: 1;

        //Setar a quantidade de itens por paginas
        $qnt_result_pg =2;

        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            //para pesquisar no banco de dados
            $result_usuarios = "SELECT * FROM usuario LIMIT $inicio, $qnt_result_pg";
            $resultado_usuarios= mysqli_query($conn, $result_usuarios); //resultados de busca joga dentro da variavel

            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID: " .$row_usuario ['id']. "<br> <hr>";
                echo "Nome: " .$row_usuario ['nome']. "<br>";
                echo "E-mail: " .$row_usuario ['email']. "<br>";
            }//imprimir valor 

              //Paginação - Somar a quantidade de usuário
              $result_pg= "SELECT COUNT(id) AS num_result FROM usuario";
              $resultado_pg = mysqli_query($conn, $result_pg);
              $row_pg = mysqli_fetch_assoc($resultado_pg);
              // echo $row_pg['num_result'];

               //Quantidade de paginas
              $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

               //Limitar os link antes depois
               $max_links = 2;

              echo "<a href = 'listar.php?pagina=1'>Primeira</a>";

              //18min
    ?>
<br>
            <button>
            
            <a href="index.php">Listar</a>
            
        
            </button>

    
</body>
</html>