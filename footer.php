<style>
	@media (max-width: 766px) {

		.bag-whatsapp-alert-arrow {
			bottom: 106px;
			right: 123px;
		}

		.bag-whatsapp-alert {
			bottom: 98px;
			right: 129px;
		}

		.bloco-wthats {
			bottom: 83px !important;
			right: 40px !important;
		}

		footer {
			height: 735px;
		}

		.div_footer {
			height: 715px;
		}

		.row_footer {
			height: 715px;
		}
	}


	.bloco-wthats .link-whats,
	.titulo {
		overflow: hidden;
		background-repeat: no-repeat;
	}

	.bloco-wthats {
		position: fixed;
		right: 46px;
		bottom: 89px;
		z-index: 100;
		width: 100px;
		height: 100px;
	}

	.bloco-wthats .aura,
	.bloco-wthats .link-whats {
		position: absolute;
		display: block;
		top: 50%;
		width: 70px;
		height: 70px;
		border-radius: 50%;
		-khtml-transform: translate(-50%, -50%);
		left: 50%;
	}

	.bloco-wthats .link-whats {
		z-index: 1;
		background-color: #44bb6e;
		background-image: url(./assets/img/whatsapp.png) !important;
		background-size: 55px !important;
		background-position: 50% 50%;
		background-size: 30px;
		-webkit-box-shadow: 6px 6px 25px 0 rgba(0, 0, 0, 0.3);
		box-shadow: 6px 6px 25px 0 rgba(0, 0, 0, 0.3);
		-webkit-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		-webkit-transition: all 0.3s ease;
		transition: all 0.3s ease;
	}

	.bloco-wthats .link-whats:hover {
		background-color: #16b84f;
	}

	.bloco-wthats .aura {
		background-color: #44bb6e;
		filter: alpha(opacity=100);
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
		-webkit-opacity: 1;
		-khtml-opacity: 1;
		-moz-opacity: 1;
		-ms-opacity: 1;
		-o-opacity: 1;
		opacity: 1;
		-webkit-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
		-webkit-transition: width 1.5s, height 1.5s, opacity 2.5s;
		transition: width 1.5s, height 1.5s, opacity 2.5s;
		-webkit-animation-name: aura;
		animation-name: aura;
		-webkit-animation-duration: 2s;
		animation-duration: 2s;
		-webkit-animation-iteration-count: infinite;
		animation-iteration-count: infinite;
	}

	.bag-whatsapp-alert {
		z-index: 1020;
		position: fixed;
		bottom: 120px;
		padding: 5px 7px;
		right: 156px;
		background: #616161;
		display: none;
		color: #fff;
		border-radius: 5px;
		font-size: 15px;
		width: auto;
	}

	.bag-whatsapp-alert-arrow {
		position: fixed;
		bottom: 128px;
		padding: 4px 7px;
		right: 150px;
		background: #616161;
		display: none;
		width: 15px;
		height: 15px;
		-webkit-transform: rotate(45deg);
		transform: rotate(45deg);
		z-index: 31;
	}

	input {
		outline: none !important;
	}

	a {
		text-decoration: none !important;
	}
</style>

<footer class="mt-auto py-3">
	<div class="container div_footer">
		<div class="row row_footer">
			<div class="col-12 col-md-3">
				<img src="assets/img/logo.png" width="100%">
			</div>
			<div class="col-12 col-md-5">
				<h4 style="color: #fff; font-weight: bold;">CONTATOS</h4>
				<a href="mailto:vedakit@vedakit.com.br" style="color: #fff;">
					<p><i class="fa-regular fa-envelope"></i> vedakit@vedakit.com.br</p>
				</a>
				<p><i class="fa-brands fa-whatsapp"></i> (16) 99264-8998</p>
				<p><i class="fa-regular fa-map-location"></i>Dr. Pio Antunes de Figueiredo - 1085. Altinópolis/SP</p>
			</div>
			<div class="col-12 col-md-4">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3316446435065!2d-47.37084088443811!3d-21.01941207853512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b76734f1748adb%3A0x394029474dbe0c2!2sVEDAKIT!5e0!3m2!1spt-BR!2sbr!4v1674654642189!5m2!1spt-BR!2sbr" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
	<div class="whatsapp">
		<span class="bag-whatsapp-alert" style="display: block;">Podemos Ajudar?</span>
		<span class="bag-whatsapp-alert-arrow" style="display: block;"></span>
		<div class="bloco-wthats" id="whatsappbtn">
			<a href="https://api.whatsapp.com/send?phone=5516992648998&text=&source=&data=" target="_blank" data-toggle-visibility="box_whatsapp" data-show-shadow="false" class="link-whats"></a>
			<div class="aura" data-ix="new-interaction"></div>
		</div>
		<audio hidden="hidden" id="whatsapp-song">
			<source src="assets/img/WhatsApp.mp3" type="audio/mp3" />
		</audio>
	</div>
</footer>