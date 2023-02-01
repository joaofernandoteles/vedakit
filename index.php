<?php

require_once 'assets/include/config.php';

$conexao = new conexao();
$con = $conexao->conecta();

?>
<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Alsite DevTeam">

	<title>VEDAKIT</title>
	<link rel="shortcut icon" href="./assets/img/logo.jpg">

	<link rel="stylesheet" href="assets/css/app.bc1a9c213d6824afeb4314c2fad55641.css">

	<link rel="stylesheet" type="text/css" href="//site-assets.fontawesome.com/releases/v6.1.2/css/all.css">


	<!-- build:css -->
	<link href="assets/css/app.css" rel="stylesheet">
	<!-- endbuild -->

	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/css/uikit.min.css" />

	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.8/dist/js/uikit-icons.min.js"></script>

</head>

<style>
	@media (max-width: 766px) {

		.div_produtos {
			padding: 25px !important;
		}

		.texto-empresa {
			padding: 25px !important;
		}
	}

	.div_foto {
		padding: 30px;
		height: 160px;
	}

	.div_texto {
		display: flex !important;
		width: 100% !important;
		height: 100px !important;
		flex-direction: column !important;
		justify-content: center !important;
		padding: 0px 25px;
	}

	.div_produtos {
		padding: 10px;
	}
</style>

<body class="d-flex flex-column h-100">

	<div role="main" class="flex-shrink-0">

		<?php include 'header.php'; ?>

		<?php include 'banner.php'; ?>

	</div>
	<section id="vedakit">
		<div class="container mb-4">
			<div class="row justify-content-center">
				<div class="col-12 col-md-6">
					<div class="section-title text-center">
						<h2>VEDAKIT</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-md-9 texto-empresa">
					<p>VEDAKIT é uma empresa a mais de 20 anos especializada na produção de peças de vedação em geral, trabalhamos com os mais variados tipos de composto e desenvolvemos peças de acordo com a necessidade de nossos clientes.</p>
					<p>Atuamos em diversos setores como indústria odontológica/ alimentícia /cervejaria/ metalúrgica na fabricação de cascata de piscina e componentes hidráulicos da construção civil, vedantes de torneiras guarnições reparos de torneiras e registro válvulas de descarga , sempre rigorosamente com controle de qualidade tudo dentro das normas de fabricação, e respeitando o meio ambiente e o nosso maior patrimônio nossos colaboradores e clientes.</p>
				</div>
			</div>
		</div>
		<div class="container-fluid cont-img">
			<img src="assets/img/img1.jpg" width="100%">
		</div>
	</section>

	<section id='destaques'>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-md-10">
					<div class="section-title text-center">
						<h2>PRODUTOS EM DESTAQUE</h2>
					</div>
				</div>
			</div>
			<div class="row">

				<?php
				$query = $con->prepare('CALL Proc_S_ProdutosRecentes');
				$query->execute();
				$res = $query->fetchAll(PDO::FETCH_OBJ);
				$query->closeCursor();
				foreach ($res as $res) {
				?>

					<div class="col-12 col-md-3 text-center div_produtos">
						<div class="card">
							<div class="row card-body">
								<div class="div_foto">
									<img src="./adm/assets/img/produto/<?= $res->Imagem ?>" style="height: 100%;">
								</div>

								<div class="div_texto">
									<h5><?= $res->Nome ?></h5>
								</div>

								<p><?= $res->Codigo ?></p>
							</div>


						</div>
					</div>

				<?php } ?>
			</div>

		</div>
	</section>
	<?php include 'footer.php'; ?>


	<script src="assets/js/app.bc1a9c213d6824afeb4314c2fad55641.js"></script>


	<script>

	</script>

</body>

</html>