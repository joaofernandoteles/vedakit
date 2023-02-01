<?php

if (!isset($_POST['Usuario'], $_POST['Senha']))
	exit;

require_once '../include/config.php';

$autenticacao = new autenticacao();
echo $autenticacao->cria_sessao($_POST['Usuario'], $_POST['Senha']);
