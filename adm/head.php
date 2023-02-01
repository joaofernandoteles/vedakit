<?php 
require_once 'assets/include/config.php';

$autenticacao = new autenticacao();
$autenticacao->verifica_sessao(basename($_SERVER['PHP_SELF']));

$conexao = new conexao();
$con = $conexao->conecta();
?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="assets/img/logo.jpg">
<title>Vedakit Admin - Sistema Administrativo</title>
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Font Awesome Icons -->
<link rel="stylesheet" type="text/css" href="//site-assets.fontawesome.com/releases/v6.0.0/css/all.css">

<!-- build:css -->
<link rel="stylesheet" href="assets/css/app.css">
<!-- endbuild -->
