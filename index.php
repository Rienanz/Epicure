<!doctype html>
<html lang="en">
  <head>
  	<title>Epicure</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/Epicure/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="/Epicure/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/Epicure/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/Epicure/css/style.css">
	<link rel="stylesheet" href="/Epicure/js/google-code-prettify/prettify.css">
	<link rel="stylesheet" href="/Epicure/css/estilos.css">
	
	<script src="/Epicure/js/jquery.min.js"></script> 
	<script src="/Epicure/js/owl.carousel.js"></script>
		
  </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
		
			<?php include_once './menu.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
			
			<p id="title">BEM-VINDO A EPICURE</p>
			
			<div class="fadeOut owl-carousel owl-theme">
				<div class="item"> <img src="images/felicidade.jpg"> </div> 
				<div class="item"> <img src="images/felicidade2.jpg"> </div> 
				<div class="item"> <img src="images/felicidade3.jpg"> </div>
	 
			</div>
			
			<div id="Somos">
					<p id="proposta-title" class="proposta">Quem Somos</p><br>
					<p class="proposta-text" class="proposta">Somos um grupo de seis pessoas cujo nome se é conhecido como Epicure. Cada um de nós possui uma maneira diferente de ver cada mínima existência, seja ela de caráter subjetivo ou não, e estamos juntos com um mesma ideia em mente: empatia para entender o porquê de haver tantas pessoas injustiçadas, sem um trabalho e sem a vertente de manter uma vida estável. Com esse fato, disponibilizamos um site que consiga passar a nossa vontade e, assim, construir uma ponte entre interessado e trabalho.</p>
					<p class="proposta-text" class="proposta">Praesent quis metus ornare, condimentum augue sit amet, fringilla dui. Integer ut ultricies lorem. Aenean eu nulla posuere, ultricies sapien at, tincidunt odio. Suspendisse sed pharetra massa. Cras hendrerit neque ac dolor faucibus, in venenatis urna scelerisque. Donec congue varius felis. Fusce libero neque, faucibus quis gravida non, pulvinar sit amet lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus rhoncus sapien in magna gravida, vitae euismod dui mollis.</p>				
					<p id="proposta-title" class="proposta">Nossa Proposta</p><br>
					<p class="proposta-text" class="proposta">Apresentamos como finalidade principal ajudar as pessoas que estão desempregadas, que querem se integrar ao mercado de trabalho o quanto antes. O desemprego se agravou na pandemia, vimos pessoas tendo que fechar suas lojas e, desse jeito, perdendo a renda, e sabemos que muitas não conseguiram voltar a exercer ofício. Então, criamos o Epicure, um site que, além de disponibilizar vagas de empresas próximas, também te dará dicas de como entrar com o pé direito em qualquer entrevista. Fazendo o mínimo para que você consiga o máximo.</p>		
					<p class="proposta-text" class="proposta">Praesent quis metus ornare, condimentum augue sit amet, fringilla dui. Integer ut ultricies lorem. Aenean eu nulla posuere, ultricies sapien at, tincidunt odio. Suspendisse sed pharetra massa. Cras hendrerit neque ac dolor faucibus, in venenatis urna scelerisque. Donec congue varius felis. Fusce libero neque, faucibus quis gravida non, pulvinar sit amet lacus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Phasellus rhoncus sapien in magna gravida, vitae euismod dui mollis.</p>
				
			</div>
          </div>
        </nav>
	  </div>
	</div>

	<link rel="stylesheet" href="/Epicure/css/animate.css">
	
	<script>
	
	jQuery(document).ready(function($) {
	  $('.fadeOut').owlCarousel({
		items: 1,
		animateOut: 'fadeOut',
		loop: true,
		margin: 10,
	  });
	  $('.custom1').owlCarousel({
		animateOut: 'slideOutDown',
		animateIn: 'flipInX',
		items: 1,
		margin: 30,
		stagePadding: 30,
		smartSpeed: 450
	  });
	});
	</script>
	<script src="/Epicure/js/jquery.min.js"></script>
    <script src="/Epicure/js/popper.js"></script>
    <script src="/Epicure/js/bootstrap.min.js"></script>
    <script src="/Epicure/js/main.js"></script>
	
  </body>
</html>