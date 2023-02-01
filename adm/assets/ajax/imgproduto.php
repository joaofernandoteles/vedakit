<?php

require_once '../include/config.php';

$conexao = new conexao();
$con = $conexao->conecta();

if ($_GET['option'] == 'select') {
    $query = $con->prepare('CALL Proc_S_U_Imagem (:IDImagem)');
    $query->bindValue(':IDImagem', $_POST['IDImagem']);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_OBJ);
    echo json_encode($res);
}


if ($_GET['option'] == 'insert') {

    //SALVA NO BANCO
    $i = 0;
    while (!empty($_FILES['Imagem']['name'][$i])) {
        $extensao1 = explode('.', $_FILES['Imagem']['name'][$i]);
        $novo_nome =  Md5(date('Y-m-d H:i:s') . rand()) . '.' . $extensao1[count($extensao1) - 1];
        $destino1 = '../img/produto/' . $novo_nome;

        move_uploaded_file($_FILES['Imagem']['tmp_name'][$i], $destino1);

        $query = $con->prepare('CALL Proc_I_ImagemProduto (:Imagem, :IDProduto, :Capa)');
        $query->bindValue(':Imagem', $novo_nome);
        $query->bindValue(':IDProduto', $_POST['IDProduto']);
        $query->bindValue(':Capa', $i == 0 ? 0 : 0);
        $query->execute();
        $query->closeCursor();
        $i++;
    }
}

if ($_GET['option'] == 'update') {

    $query = $con->prepare('CALL Proc_S_U_Imagem (:IDImagem)');
    $query->bindValue(':IDImagem', $_POST['IDImagem']);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_OBJ);
    $novo_nome = $res->Imagem;
    $unlink1 = '../img/produto/' . $res->Imagem;
    $query->closeCursor();



    if (isset($_FILES['Imagem']['name']) && !empty($_FILES['Imagem']['name'])) {
        unlink($unlink1);
        $extensao1 = explode('.', $_FILES['Imagem']['name']);
        $novo_nome =  Md5(date('Y-m-d H:i:s') . rand()) . '.' . $extensao1[count($extensao1) - 1];
        $destino1 = '../img/produto/' . $novo_nome;
        move_uploaded_file($_FILES['Imagem']['tmp_name'], $destino1);
    }

    $query = $con->prepare('CALL Proc_U_ImagemProduto (:IDImagem, :Imagem, :Capa)');
    $query->bindValue(':IDImagem', $_POST['IDImagem']);
    $query->bindValue(':Imagem', $novo_nome);
    $query->bindValue(':Capa', $_POST['Capa']);
    $query->execute();
}


if ($_GET['option'] == 'deleteimg') {

    $query = $con->prepare('CALL Proc_S_U_Imagem (:IDImagem)');
    $query->bindValue(':IDImagem', $_POST['IDImagem']);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_OBJ);
    $unlink1 = '../img/produto/' . $res->Imagem;
    $query->closeCursor();


    $query = $con->prepare('CALL Proc_D_ImagemProduto (:IDImagem)');
    unlink($unlink1);
    $query->bindValue(':IDImagem', $_POST['IDImagem']);
    $query->execute();
    $query->closeCursor();
}
