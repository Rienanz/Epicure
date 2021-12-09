<?php

include_once './classes/epicure.class.php';
$database = new epicure();

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Blog</title>
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
			
			<p id="title">Nosso ambiente profissional é repleto de blogs instrutivos.<br>
			Que tal uma olhada nos mais recentes?</p>
			
			
				<?php 
				
    				$infoDicas = $database->procuraDicas();
    								
    				foreach($infoDicas as $infoDica){
						    				    
    				    $codUsuario = $infoDica['CodUsuario'];
						
						$infoUsuario = $database->procuraUsuario($codUsuario);
						
						$nomeUsuario = $infoUsuario['NomeUsuario'];
						$codDica = $infoDica['CodDicas'];
    				    $tituloDica = $infoDica['TituloDicas'];
						$dica = substr($infoDica['DescricaoDicas'], 0, 200);
										    
        				echo("
        
							<div class='post-blog'>
								<div class='post-usuario'>
									<div class='post-left'>
										<div>
											<label>Usuário: $nomeUsuario</label>
										</div>
										<div class=''>
											<label>$tituloDica</label>
										</div>
										<div class='comentario'>
											<label>$dica...</label>
										</div>
									</div>
									<div class='post-right'>
										<div class='avaliacao'>
						");
						
						if($_SESSION['codEmpresa'] == NULL){
						
							echo("
								<a href='/Epicure/processo/like.php'><button id='like' class='fa fa-thumbs-o-up like'></button></a><br>
							");
						
						}
						
						echo("
											<a href='./dicas/dica.php?dc=$codDica'><button class='button'>Veja Mais</button></a>
										</div>
									</div>
								</div>
							</div>
        				");       				
    				    
    				}
				
				?>
			
	<link rel="stylesheet" href="/Epicure/css/animate.css">
	<script src="/Epicure/js/jquery.min.js"></script>
    <script src="/Epicure/js/popper.js"></script>
    <script src="/Epicure/js/bootstrap.min.js"></script>
    <script src="/Epicure/js/main.js"></script>
  </body>
</html>