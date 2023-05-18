<?php
require('../conn.php');
$prod_date=$_POST['prod_date'];
$prod_name =$_POST ['prod_name'];
$tip_defeito=$_POST['tip_defeito'];
$horario_inicio=$_POST['horario_inicio'];
$horario_final=$_POST['horario_final'];

if (empty($prod_date)||empty($prod_name) || empty($tip_defeito)||empty($horario_inicio)||empty($horario_final)){
    print "<script>alert('erro')</script>";
    print "<script>window.location.href='../cadastrar.php'</script>";
}else{
    $cad_defeito = $pdo->prepare("INSERT INTO defeituoso(data,nome,tip_defeito,horario_inicio,horario_final)
    VALUES(:prod_date,:prod_name,:tip_defeito,:horario_inicio,:horario_final)");
    $cad_defeito->execute(array(
        'prod_date'=>$prod_date,
        ':prod_name' => $prod_name,
        ':tip_defeito' => $tip_defeito,
        ':horario_inicio' =>$horario_inicio,
        ':horario_final' =>$horario_final,
    ));
    print "<script>alert('Salvo com sucesso')</script>";
    print "<script>window.location.href='../menu.php'</script>";
	exit();
}