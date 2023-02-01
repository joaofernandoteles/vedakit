<?php


// VERSÃO DO NODE: 12.14.0


/**
 * Arquivo de configurações gerais - Alsite
 * @author Alsite DevTeam
 * @version 2.4
 */

/*------------------------- SITE -------------------------*/
$nome_site = 'HELP MARIDO DE ALUGUEL';
$url_site = 'http://dominio.com.br'; //SEM BARRA NO FINAL

/*------------------------- E-MAIL -------------------------*/
$email_host = 'mail.DOMINIO.com.br';
$email_autenticacao = 'autentica@DOMINIO.com.br';
$senha_autenticacao = 'murloc14';
$email_from = 'CONTATO@DOMINIO.com.br';
$email_to = 'CONTATO@DOMINIO.com.br';

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

class conexao
{

	private static $host = 'vedakit.mysql.dbaas.com.br';
	private static $db = 'vedakit';
	private static $usuario = 'vedakit';
	private static $senha = 'A85sdsds5fds@@';
	private static $con;

	public function conecta()
	{
		try {
			self::$con = new PDO('mysql:host=' . self::$host . '; dbname=' . self::$db, self::$usuario, self::$senha);
			self::$con->exec('SET CHARACTER SET utf8');
			self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //HABILITA EXIBIÇÃO DE ERROS DA CONEXÃO
			self::$con->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); //HABILITA EXIBIÇÃO DE ERROS DA CONEXÃO
			return self::$con;
		} catch (PDOException $e) {
			echo 'ERRO: ' . $e->getMessage();
		}
	}

	public function injection($string)
	{
		return addslashes($string);
	}

	public function injection_paginacao($string)
	{
		return preg_replace("/[^0-9]/", '', $string);
	}
}



class autenticacao
{

	public function cria_sessao($Usuario, $Senha)
	{
		$conexao = new conexao();
		$con = $conexao->conecta();

		$Usuario = $conexao->injection($Usuario); //TRATAMENTO DO POST
		$Senha = $conexao->injection($Senha); //TRATAMENTO DO POST

		$query = $con->prepare('SELECT * FROM TB_Usuario WHERE Usuario = :Usuario AND Senha = :Senha');
		$query->bindParam(':Usuario', $Usuario);
		$query->bindParam(':Senha', $Senha);
		$query->execute();
		$res = $query->fetch(PDO::FETCH_OBJ);
		$total = $query->rowCount();

		if ($total == 1) {
			session_start();
			$_SESSION['Usuario'] = $Usuario;
			$_SESSION['Senha'] = $Senha;
			$_SESSION['IDUsuario'] = $res->IDUsuario;
			$_SESSION['Nome'] = $res->Nome;
			return 'correto';
		} else
			return 'erro';
	}

	public function verifica_sessao($url)
	{
		session_start();
		if (isset($_SESSION['Usuario']) && isset($_SESSION['Senha'])) {
			$conexao = new conexao();
			$con = $conexao->conecta();

			//TRATA OS DADOS
			$Usuario = $conexao->injection($_SESSION['Usuario']);
			$Senha = $conexao->injection($_SESSION['Senha']);

			//VERIFICA NO BANCO
			$query = $con->prepare('SELECT * FROM TB_Usuario WHERE Usuario = :Usuario AND Senha = :Senha');
			$query->bindParam(':Usuario', $Usuario);
			$query->bindParam(':Senha', $Senha);
			$query->execute();
			$res = $query->fetch(PDO::FETCH_OBJ);
			$total = $query->rowCount();

			//SE AS CREDENCIAS NÃO AUTENTICAREM
			if ($total == 0)
				$this->encerra_sessao();

			//NÃO DEIXA ACESSAR A PÁGINA DE LOGIN, PORQUÊ JÁ ESTÁ LOGADO
			if ($url == 'login.php') {
				header('location: index.php');
				exit;
			}
		}
		//CASO NÃO EXISTIR SESSÃO
		elseif ($url != 'login.php')
			$this->encerra_sessao();
	}

	public function encerra_sessao()
	{
		session_destroy();
		header('location: login.php');
		exit;
	}
}
