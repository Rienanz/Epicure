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
		
			<?php include_once './menu.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
		<span class="banner-empresa">
			<?php 
			
				if($_SESSION == NULL){
	
					die(header("Refresh: 0.1;url=/Epicure/login.php"));
					
				}else{
										
					if($_SESSION['codEmpresa'] != NULL){
					
						$database = new epicure();	
					
						$codEmpresa = $_SESSION['codEmpresa'];
						
						$infoEmpresa = $database->procuraEmpresa($codEmpresa);
						
						$nomeEmpresa = $infoEmpresa['NomeEmpresa'];
						$cnpjEmpresa = $infoEmpresa['CNPJEmpresa'];
						$emailEmpresa = $infoEmpresa['EmailEmpresa'];
						$telefoneEmpresa = $infoEmpresa['TelefoneEmpresa'];
						$imagem = base64_encode($infoEmpresa['ImagemEmpresa']);
						
						$infoEndereco = $database->procuraEnderecoEmpresa($codEmpresa); 
						
						$ruaEmpresa = $infoEndereco['RuaEnderecoEmpresa'];
						$cidadeEmpresa = $infoEndereco['CidadeEnderecoEmpresa'];
						$tipoEmpresa = $infoEndereco['TipoEnderecoEmpresa'];
						$numEmpresa = $infoEndereco['NumEnderecoEmpresa'];
						$cepEmpresa = $infoEndereco['CEPEnderecoEmpresa'];
					
					}elseif($_SESSION['permissaoUsuario'] == "Usuario"){
						
						die(header("Refresh: 0.1;url=perfil.php"));
						
					}elseif($_SESSION['permissaoUsuario'] == "Empreendedor"){
						
						die(header("Refresh: 0.1;url=perfil-profissional.php"));
						
					}elseif($_SESSION['permissaoUsuario'] == "Admin"){
						
						die(header("Refresh: 0.1;url=/Epicure/dashboard/dashboard.php"));
						
					}

				}
				
				echo("
				
					<img class='circle-banner' src='data:image/jpeg;base64,$imagem' alt=''>
					<h4 id='nomeCorno' style='text-align: center;'> $nomeEmpresa </h4>
				
				"); 
				
			?>
		</span>
		<div class="bio">
			<form method="POST" action="./processo/atualizaEmpresa.php" enctype="multipart/form-data">
			<?php
			
				echo("
				
				<div id='form-perfil-left'>
					<label class='formulario'>CNPJ</label><br>
					<input type='text' name='txtCNPJ' value='$cnpjEmpresa'><br> 
					<label class='formulario'>Nome</label><br>
					<input type='text' name='txtNome' value='$nomeEmpresa'><br>
					<label class='formulario'>Imagem</label><br>
					<input type='file' name='imagem'><br>'
					<label class='formulario'>Email</label><br>
					<input type='text' name='txtEmail' value='$emailEmpresa'><br>
					<label class='formulario'>Telefone</label><br>
					<input type='text' name='txtTelefone' value='$telefoneEmpresa'><br>
				</div>
				<div form-perfil-right>
					<label class='formulario'>Rua</label><br>
					<input type='text' name='txtRua' value='$ruaEmpresa'><br>
					<label class='formulario'>Cidade</label><br>
					<input type='text' name='txtCidade' value='$cidadeEmpresa'><br>
					<label class='formulario'>CEP</label><br>
					<input type='text' name='txtCEP' value='$cepEmpresa'><br>
					<label class='formulario'>N??mero da Resid??ncia</label><br>
					<input type='text' name='txtNumEndereco' value='$numEmpresa'><br>
					<label class='formulario'>Tipo de Endere??o</label><br>
					
				");
				
				?>				
				
					<select id='txtTipoEndereco' name='txtTipoEndereco'>
						<option value='Casa' selected="<?php if($tipoEmpresa == "Casa"){echo("selected");} ?>"?>Casa</option>
						<option value='Pr??dio' selected="<?php if($tipoEmpresa == "Predio"){echo("selected");} ?>"?>>Pr??dio</option>
						<option value='Galp??o' selected="<?php if($tipoEmpresa == "Galpao"){echo("selected");} ?>">Galp??o</option>
						<option value='Outro' selected="<?php if($tipoEmpresa == "Outro"){echo("selected");} ?>">Outro</option>
					</select><br>
				</div>
				<button type='submit' class='editar-perfil'>Editar</button>
			</form>
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