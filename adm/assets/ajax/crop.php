<?php

$dataImg = explode(";", $_POST["image"]);
$dataImg = explode(",", $dataImg[1]);
$dataImg = base64_decode($dataImg[1]);

$nomeImagem = md5(date('Y-m-d H:i:s')) . '.png';
$pasta = '../img/produtos/';

file_put_contents($pasta . $nomeImagem, $dataImg);

echo $nomeImagem;

