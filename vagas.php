<?php

include_once './classes/epicure.class.php';
$database = new epicure();

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Vagas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/Epicure/css/bootstrapTheme.css" rel="stylesheet">
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
		
			<?php 
			
				include_once './menu.php'; 
				
				if($_SESSION == NULL){
	
					die(header("Refresh: 0.1;url=/Epicure/login.php"));
					
				}
				
			?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
	  <label id="title-vagas">VAGAS</label>
	  <?php 
				
    				$infoVagas = $database->procuraVagas();
    								
    				foreach($infoVagas as $infoVaga){
						    				    
    				    $idEmpresa = $infoVaga['CodEmpresa'];
						
						$infoEmpresa = $database->procuraEmpresa($idEmpresa);
						
						$nomeEmpresa = $infoEmpresa['NomeEmpresa'];
    				    $codVaga = $infoVaga['CodVaga'];
						$tituloVaga = $infoVaga['TituloVaga'];
						$tipoVaga = $infoVaga['TipoVaga'];
    				    $descricaoVaga = substr($infoVaga['DescricaoVaga'], 0, 200);
    				    $requerimentosVaga = substr($infoVaga['RequerimentosVaga'], 0, 60);
				    
        				echo("
        
            				<div class='jobs'>
								<div class='info-vagas'>	
									<div class='nome-empresa'>
										<label>Empresa Responsável: $nomeEmpresa</label><br>
									</div>
									<div class='cargo-disponivel'>
										<label>Cargo disponível: $tituloVaga</label><br>
									</div>
									<div class='tipo-vaga'>
										<label>Tipo de Vaga: $tipoVaga</label><br>
									</div>
									<div class='descricao-vagas'>
										<label>Breve descrição: $descricaoVaga...</label>
									</div>
									<div class='requerimentos-vagas'>
										<label>Requerimentos da vaga: $requerimentosVaga...</label>
									</div>
								</div>
								<div class='detalhes-vagas'>
									<a href='./vagas/vaga.php?vg=$codVaga'><button class='button-vagas'>Detalhes</button></a>
								</div>
							</div>
        
        				");       				
    				    
    				}
				
				?>
	  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
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