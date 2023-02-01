<?php

require_once '../include/config.php';

$conexao = new conexao();
$con = $conexao->conecta();

if ($_GET['option'] == 'select') {
    $query = $con->prepare('CALL Proc_S_U_Categoria (:IDCategoria)');
    $query->bindValue(':IDCategoria', $_POST['IDCategoria']);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_OBJ);
    echo json_encode($res);
}

if ($_GET['option'] == 'insert') {

    //SALVA NO BANCO
    $query = $con->prepare('CALL Proc_I_Categoria (:Nome)');
    $query->bindValue(':Nome', $_POST['Nome']);
    $query->execute();
    $query->closeCursor();
}

if ($_GET['option'] == 'update') {


    $query = $con->prepare('CALL Proc_U_Categoria (:IDCategoria, :Nome)');
    $query->bindValue(':IDCategoria', $_POST['IDCategoria']);
    $query->bindValue(':Nome', $_POST['Nome']);
    $query->execute();
    $query->closeCursor();
}

if ($_GET['option'] == 'delete') {

    $query = $con->prepare('CALL Prco_D_Categoria (:IDCategoria)');
    $query->bindValue(':IDCategoria', $_POST['IDCategoria']);
    $query->execute();
    $query->closeCursor();
}
