<?php
    require("conn.php");

    $tabela = $pdo->prepare("SELECT id,data,nome,tip_defeito,horario_inicio,horario_final
    FROM defeituoso;");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Tabela vazia!!!');
        </script>";
    }

?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Tabela de defeitos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 style="text-align:center;">Tabela de defeitos</h1>
            <br>  
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID DEFEITOS</th>
            <th scope="col">DATA</th>
            <th scope="col">NOME</th>
            <th scope="col">TIPO DEFEITO</th>
            <th scope="col">HORARIO INICIO</th>
            <th scope="col">HORARIO FINAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($rowTabela as $linha){
                echo '<tr>';
                echo "<th scope='row'>".$linha['id']."</th>";
                echo "<td>".$linha['data']."</td>";
                echo "<td>".$linha['nome']."</td>";
                echo "<td>".$linha['tip_defeito']."</td>";
                echo "<td>".$linha['horario_inicio']."</td>";
                echo "<td>".$linha['horario_final']."</td>";
               
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        <a href="cadastrar.php" class="btn btn-primary">CADASTRAR DEFEITO</a>
        <a href="menu.php" class="btn btn-primary">VOLTAR</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>