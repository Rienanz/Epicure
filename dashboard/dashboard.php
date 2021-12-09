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
		
			<?php include_once '../menu.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
			
			<?php
			
				include_once '../classes/epicure.class.php';
				$database = new epicure();
				
				$infoUsuarios = $database->procuraUsuarios();
				
				echo("
										   
						<table style='' width='100%' border='0' align='center'>
				
							<tr>

								<td colspan='1' align='center'></td>
								<td colspan='1' align='center'>Código</td>
								<td colspan='1' align='center'>Nome</td>
								<td colspan='1' align='center'>Email</td>
								<td colspan='1' align='center'>Nascimento</td>
								<td colspan='1' align='center'>CPF</td>
								<td colspan='1' align='center'>Permissão</td>
				
							</tr>
						
				");    
					 
				foreach($infoUsuarios as $infoUsuario){
									   
					$imagem = base64_encode($infoUsuario['ImagemUsuario']);
					
					echo("
					
						<tr>

							<td align='center'><img class='circle-banner' style='width: 120px; height: 120px;' src='data:image/jpeg;base64,{$imagem}'></img></td>
							<td align='center'>{$infoUsuario['CodUsuario']}</td>
							<td align='center'>{$infoUsuario["NomeUsuario"]}</td>
							<td align='center'>{$infoUsuario["EmailUsuario"]}</td>
							<td align='center'>{$infoUsuario["NascimentoUsuario"]}</td>
							<td align='center'>{$infoUsuario["CPFUsuario"]}</td>
							<td align='center'>{$infoUsuario["PermissaoUsuario"]}</td>						
							
							
						</tr>
					
					");
					
				}
  
				echo("
			
					</table>
					<br><br><br><br>
				
				");
				
			?>
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