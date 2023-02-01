<style>
	@media (max-width: 766px) {

		.img_banner img{
			height: 160px !important;
		}
	}

	.img_banner img{
		height: 264px;
	}
</style>
<section id="banner" style="height: max-content;display: flex;align-items: flex-end; overflow-x: hidden;">

	<div class="uk-position-relative uk-visible-toggle uk-light" autoplay="true" autoplay-interval="4000" tabindex="-1" uk-slider style="width: 100%; overflow-x: hidden;">

		<ul class="uk-slider-items uk-child-width-1-1" style="display: flex; flex-direction: row; align-items: center;">

			<?php
			$query = $con->prepare('CALL Proc_S_Banner');
			$query->execute();
			$res = $query->fetchAll(PDO::FETCH_OBJ);
			$query->closeCursor();
			foreach ($res as $res) {
			?>
				<li class="uk-width-1-1">
					<div class="uk-panel img_banner">
						<img src="./adm/assets/img/banner/<?= $res->Imagem ?>" width="1920" alt="">
					</div>
				</li>
			<?php } ?>

		</ul>

		<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
		<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

	</div>

</section>