<?php

require_once '../include/config.php';

$conexao = new conexao();
$con = $conexao->conecta();

if ($_GET['option'] == 'select') {
    $query = $con->prepare('CALL Proc_S_U_Produto (:IDProduto)');
    $query->bindValue(':IDProduto', $_POST['IDProduto']);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_OBJ);
    echo json_encode($res);
}

if ($_GET['option'] == 'insert') {

    //SALVA NO BANCO
    $query = $con->prepare('CALL Proc_I_Produto (:Nome, :Codigo, :Categoria)');
    $query->bindValue(':Nome', $_POST['Nome']);
    $query->bindValue(':Codigo', $_POST['Codigo']);
    $query->bindValue(':Categoria', $_POST['IDCategoria']);
    $query->execute();
    //PEGA O IDProduto
    $res = $query->fetch(PDO::FETCH_OBJ);
    $IDProduto = $res->IDProduto;
    $query->closeCursor();

    $i = 0;
    while (!empty($_FILES['Imagem']['name'][$i])) {
        $extensao1 = explode('.', $_FILES['Imagem']['name'][$i]);
        $novo_nome =  Md5(date('Y-m-d H:i:s') . rand()) . '.' . $extensao1[count($extensao1) - 1];
        $destino1 = '../img/produto/' . $novo_nome;

        move_uploaded_file($_FILES['Imagem']['tmp_name'][$i], $destino1);

        $query = $con->prepare('CALL Proc_I_ImagemProduto (:Imagem, :IDProduto, :Capa)');
        $query->bindValue(':Imagem', $novo_nome);
        $query->bindValue(':IDProduto', $IDProduto);
        $query->bindValue(':Capa', $i == 0 ? 1 : 0);
        $query->execute();
        $query->closeCursor();
        $i++;
    }
}

if ($_GET['option'] == 'update') {

    $query = $con->prepare('CALL Proc_U_Produto (:IDProduto, :Nome, :Codigo, :Categoria)');
    $query->bindValue(':IDProduto', $_POST['IDProduto']);
    $query->bindValue(':Nome', $_POST['Nome']);
    $query->bindValue(':Codigo', $_POST['Codigo']);
    $query->bindValue(':Categoria', $_POST['IDCategoria']);
    $query->execute();
}

if ($_GET['option'] == 'delete') {
    $query = $con->prepare('CALL Proc_D_Produto (:IDProduto)');
    $query->bindValue(':IDProduto', $_POST['IDProduto']);
    $query->execute();
    $query->closeCursor();
}

