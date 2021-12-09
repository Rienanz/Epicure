<?php

include_once '../classes/epicure.class.php';
$database = new epicure();

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Vaga</title>
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
			
				include_once '../menu.php'; 
			
				if($_SESSION == NULL){
	
					die(header("Refresh: 0.1;url=/Epicure/login.php"));
					
				}
			
			?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
			
				<?php
				
					$codVaga = str_replace("/Epicure/vagas/vaga.php?vg=", "", $_SERVER["REQUEST_URI"]);
					
    				$infoVaga = $database->procuraVaga($codVaga);
					
					if($infoVaga == NULL || $infoVaga == ""){
						
						die(header("Refresh: 0.1;url=/Epicure/index.php"));
						
					}
    				   				    
					$codEmpresa = $infoVaga['CodEmpresa'];
					
					$infoEmpresa = $database->procuraEmpresa($codEmpresa);
										
					$nomeEmpresa = $infoEmpresa['NomeEmpresa'];
					$codVaga = $infoVaga['CodVaga'];
					$tituloVaga = $infoVaga['TituloVaga'];
					$tipoVaga = $infoVaga['TipoVaga'];
					$descricaoVaga = $infoVaga['DescricaoVaga'];
					$requerimentosVaga = $infoVaga['RequerimentosVaga'];
						
					if($_SESSION['codEmpresa'] == $codEmpresa){
						
						echo("
						
							<a href='/Epicure/processo/excluir-vaga.php?vg=$codVaga'><button class='button-vagas'>Excluir</button></a>
							
						");
						
					}
				    
					echo("
	
						<p id='title'>$tituloVaga</p>
						<p id=''>Tipo de Vaga: $tipoVaga</p>
						<p id=''>Requerimentos: $requerimentosVaga</p>
						<p id=''>$descricaoVaga</p>
	
					");       				
    				    				
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
	<script src="/Epicure/js/jquery.min.js"></script>
    <script src="/Epicure/js/popper.js"></script>
    <script src="/Epicure/js/bootstrap.min.js"></script>
    <script src="/Epicure/js/main.js"></script>
  </body>
</html>