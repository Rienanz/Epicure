<?php

include_once './classes/epicure.class.php';

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Perfil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/bootstrapTheme.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="js/google-code-prettify/prettify.css">
	<link rel="stylesheet" href="css/estilos.css">
	
	<script src="js/jquery.min.js"></script> 
	<script src="js/owl.carousel.js"></script>
		
  </head>
  <body>
		<div class="wrapper d-flex align-items-stretch">
		
			<?php include_once './menu.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
		<span class="banner-user">
			<?php 
			
				if($_SESSION == NULL){
	
					die(header("Refresh: 0.1;url=login.php"));
					
				}else{
										
					if($_SESSION['codEmpresa'] != NULL){
					
						die(header("Refresh: 0.1;url=perfil-empresa.php"));
					
					}elseif($_SESSION['permissaoUsuario'] == "Usuario"){
						
						$database = new epicure();
						
						$codUsuario = $_SESSION['codUsuario'];
						
						$infoUsuario = $database->procuraUsuario($codUsuario);
						
						$nomeUsuario = $infoUsuario['NomeUsuario'];
						$emailUsuario = $infoUsuario['EmailUsuario'];
						$nascimentoUsuario = $infoUsuario['NascimentoUsuario'];
						$cpfUsuario = $infoUsuario['CPFUsuario'];
						$imagem = base64_encode($infoUsuario['ImagemUsuario']);
												
						$infoEndereco = $database->procuraEnderecoUsuario($codUsuario); 
						
						if($infoEndereco != NULL){
						
							$ruaUsuario = $infoEndereco['RuaEnderecoUsuario'];
							$cidadeUsuario = $infoEndereco['CidadeEnderecoUsuario'];
							$tipoUsuario = $infoEndereco['TipoEnderecoUsuario'];
							$numUsuario = $infoEndereco['NumEnderecoUsuario'];
							$cepUsuario = $infoEndereco['CEPEnderecoUsuario'];
						
						}
						
						//$dadosEmpregado = $database->procuraDetalhesUsuario($codUsuario);
						
					}elseif($_SESSION['permissaoUsuario'] == "Empreendedor"){
						
						die(header("Refresh: 0.1;url=perfil-profissional.php"));
						
					}elseif($_SESSION['permissaoUsuario'] == "Admin"){
						
						die(header("Refresh: 0.1;url=/Epicure/dashboard/dashboard.php"));
						
					}

				}
				
				echo("
				
					<img class='circle-banner' src='data:image/jpeg;base64,$imagem' alt=''>
					<h4 id='nomeCorno' style='text-align: center;'> $nomeUsuario </h4>
				
				"); 
				
			?>
		</span>
		<div class="bio">
			<form method="POST" action="./processo/atualizaUsuario.php" enctype="multipart/form-data">
			<?php
			
				echo("
				
				<div id='form-perfil-left'>
					<label class='formulario'>CPF</label><br>
					<input type='text' name='txtCPF' value='$cpfUsuario'><br> 
					<label class='formulario'>Nome</label><br>
					<input type='text' name='txtNome' value='$nomeUsuario'><br>
					<label class='formulario'>Imagem</label><br>
					<input type='file' name='imagem'><br>'
					<label class='formulario'>Email</label><br>
					<input type='text' name='txtEmail' value='$emailUsuario'><br>
				</div>
				<div form-perfil-right>
					<label class='formulario'>Rua</label><br>
					<input type='text' name='txtRua' value='$ruaUsuario'><br>
					<label class='formulario'>Cidade</label><br>
					<input type='text' name='txtCidade' value='$cidadeUsuario'><br>
					<label class='formulario'>CEP</label><br>
					<input type='text' name='txtCEP' value='$cepUsuario'><br>
					<label class='formulario'>Número da Residência</label><br>
					<input type='text' name='txtNumEndereco' value='$numUsuario'><br>
					<label class='formulario'>Tipo de Endereço</label><br>
					
				");
				
				?>				
				
					<select id='txtTipoEndereco' name='txtTipoEndereco'>
						<option value='Casa' selected="<?php if($tipoUsuario == "Casa"){echo("selected");} ?>">Casa</option>
						<option value='Apartamento' selected="<?php if($tipoUsuario == "Apartamento"){echo("selected");} ?>">Apartamento</option>
						<option value='Condominio' selected="<?php if($tipoUsuario == "Condominio"){echo("selected");} ?>">Condomínio</option>
						<option value='Outro' selected="<?php if($tipoUsuario == "Outro"){echo("selected");} ?>">Outro</option>
					</select><br>
				</div>
				<button type='submit' class='editar-perfil'>Editar</button>
			</form>
		</div>

          </div>
        </nav>
	  </div>
	</div>
	
			<link rel="stylesheet" href="css/animate.css">
	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>