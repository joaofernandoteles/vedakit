<style>
	@media (max-width: 766px) {

		header #topbar {
			display: none !important;
		}

		.logo_header {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.busca_header {
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		.col-busca {
			padding: 19px 5px;
		}

		#formBusca {
			padding-right: 15px;
		}
	}

	.botao_produto {
		border: none;
		font-size: 18px;
		height: 50px;
		padding-top: 10px;
	}

	#div_categorias {
		background: rgb(4, 49, 110);
	}

	.li_header:hover p {
		color: #04316e;
	}

	.uk-button-default:hover {
		color: #04316e !important;
	}


	#main-menu ul.menu>li>button {
		color: #fff;
	}

	.uk-dropdown-nav>li.uk-active>a,
	.uk-dropdown-nav>li>a:hover {
		color: #fff !important;
	}

	.mobile-menu>ul>li ul li a {
		display: block;
		padding-left: 30px;
		line-height: 45px;
		color: #04316e;
		font-size: 14px;
		font-family: Roboto, sans-serif;
		font-weight: 600;
		text-transform: uppercase;
		position: relative;
	}
</style>

<header>

	<div id="topbar">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-3">
					<i class="fa-brands fa-whatsapp"></i> (16) 99264-8998
				</div>
				<div class="col-12 col-md-3">
					<i class="far fa-envelope"></i> vedakit@vedakit.com.br
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row py-4">
			<div class="col-12 col-md-2 text-end logo_header">
				<a href="index.php">
					<img src="assets/img/logo.jpg" width="160">
				</a>
			</div>
			<div class="col-12 col-md-7 text-end col-busca">
				<div class="row justify-content-end busca_header">
					<div class="busca-input" style="width:80%;">
						<form id="formBusca" action="busca.php#destaques" method="post">
							<input type="text" id="Busca" name="Busca" class="form-gcont" style="width:94%; margin:auto 0;" placeholder="Faça sua busca">
							<button class="btn btn-busca" style="width:5%; margin:auto 0;"><i class="fa-solid fa-magnifying-glass" style="font-size:20px ;"></i></button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3 col-orc text-center">
				<a href="https://api.whatsapp.com/send?phone=5516992648998&text=&source=&data=" target="_blank" data-toggle-visibility="box_whatsapp" data-show-shadow="false" class="link-whats">
					<div>
						<i class="fa-solid fa-2x fa-file-invoice-dollar"></i> Solicitar Orçamento
					</div>
				</a>
			</div>
		</div>
	</div>

	<div class="wrap_menu">
		<div class="container">
			<nav id="main-menu" class="">
				<img class="pull-nav" src="assets/img/menu-icon.png" alt="menu-icon">
				<ul class="text-center menu d-md-flex align-items-center justify-content-md-around">

					<li class="menu-item"><a href="index.php">HOME</a></li>
					<li class="menu-item"><a href="index.php">Empresa</a></li>

					<li class="menu-item uk-inline li_header" style="height: 60px;">
						<button class="uk-button uk-button-default botao_produto" type="button" style="margin-bottom:-10px !important;">
							<p>Produtos</p>
						</button>
						<div id="div_categorias" uk-dropdown="pos: bottom-center; animation: reveal-top; animate-out: true; duration: 500">
							<ul class="uk-nav uk-dropdown-nav">

								<li class="uk-nav-header"><a href="categoria.php?IDCategoria=#destaques"> TODOS</a></li>
								<li class="uk-nav-divider"></li>

								<?php
								$query = $con->prepare('CALL Proc_S_Categoria');
								$query->execute();
								$res = $query->fetchAll(PDO::FETCH_OBJ);
								$query->closeCursor();
								foreach ($res as $res) {
								?>
									<li class="uk-nav-header"><a href="categoria.php?IDCategoria=<?= $res->IDCategoria ?>#destaques"><?= $res->Nome ?></a></li>
									<li class="uk-nav-divider"></li>
								<?php } ?>
							</ul>
						</div>
					</li>


					<li class="menu-item"><a href="https://api.whatsapp.com/send?phone=5516992648998&text=&source=&data=" target="_blank" data-toggle-visibility="box_whatsapp" data-show-shadow="false" class="link-whats">Orçamento</a></li>
					<li class="menu-item"><a href="https://api.whatsapp.com/send?phone=5516992648998&text=&source=&data=" target="_blank" data-toggle-visibility="box_whatsapp" data-show-shadow="false" class="link-whats">CONTATO</a></li>
				</ul>
			</nav>
		</div>
	</div>

</header>

<div class="mobile-menu-cover"></div>
<!-- MOBILE MENU -->
<nav class="mobile-menu" style="background: #fff !important;">

	<a href="index.php">
		<img src="assets/img/logo.jpg" alt="logo" class="img-fluid">
	</a>

	<svg class="svg-plus pull-nav">
		<use xlink:href="#svg-plus"></use>
	</svg>

	<!-- MENU LIST -->
	<ul class="menu">

		<li class="menu-item li-header"><a href="index.php" class="header">HOME</a></li>
		<li class="menu-item li-header"><a href="" class="header">Empresa</a></li>

		<li>
			<a href="#" class="quem_somos">PRODUTOS
				<!-- SVG ARROW -->
				<svg class="svg-arrow">
					<use xlink:href="#svg-arrow"></use>
				</svg>
				<!-- /SVG ARROW -->

			</a>
			<ul style=" background: none; border-top: none;">
				<li>
					<a href="categoria.php?IDCategoria=#destaques" class="quem_somos">TODOS</a>
				</li>

				<?php
				$query = $con->prepare('CALL Proc_S_Categoria');
				$query->execute();
				$res = $query->fetchAll(PDO::FETCH_OBJ);
				$query->closeCursor();
				foreach ($res as $res) {
				?>
					<li>
						<a href="categoria.php?IDCategoria=<?= $res->IDCategoria ?>#destaques" class="quem_somos"><?= $res->Nome ?></a>
					</li>

				<?php } ?>

			</ul>
		</li>
		<li class="menu-item li-header"><a href="https://api.whatsapp.com/send?phone=5516992648998&text=&source=&data=" target="_blank" data-toggle-visibility="box_whatsapp" data-show-shadow="false" class="link-whats" class="header">ORÇAMENTO</a></li>
		<li class="menu-item li-header"><a href="https://api.whatsapp.com/send?phone=5516992648998&text=&source=&data=" target="_blank" data-toggle-visibility="box_whatsapp" data-show-shadow="false" class="link-whats" class="header">CONTATO</a></li>

	</ul>

	<svg style="display: none;">
		<symbol id="svg-arrow" viewBox="0 0 3.923 6.64014" preserveAspectRatio="xMinYMin meet">
			<path d="M3.711,2.92L0.994,0.202c-0.215-0.213-0.562-0.213-0.776,0c-0.215,0.215-0.215,0.562,0,0.777l2.329,2.329
			L0.217,5.638c-0.215,0.215-0.214,0.562,0,0.776c0.214,0.214,0.562,0.215,0.776,0l2.717-2.718C3.925,3.482,3.925,3.135,3.711,2.92z" />
		</symbol>
	</svg>

	<svg style="display: none;">
		<symbol id="svg-plus" viewBox="0 0 13 13" preserveAspectRatio="xMinYMin meet">
			<rect x="5" width="3" height="13" />
			<rect y="5" width="13" height="3" />
		</symbol>
	</svg>

</nav>