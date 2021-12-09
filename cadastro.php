<?php 

	session_start();

?>

<!doctype html>
<html lang="en" id="html-cadastro">
<head>
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
	<title>Cadastro</title>
	
	<style>
	
		#cadastro-form{
		
			background-image: url("./images/cadastro.jpg");
		
		}
	
	</style>

<body>

	<div class="wrapper d-flex align-items-stretch">
		
		<?php 
		
			include_once './menu.php'; 
			
			if($_SESSION != NULL){

				die(header("Refresh: 0.1;url=index.php"));
				
			}
			
		?>


		<div id="cadastro-form">
			<div id="cadastro-title">
				<label class="cadastro-titulo">CADASTRO</label>
			</div>
			<div id="cadastro-form-left">
				<form method="post" action="./processo/cadastro.php">
					<label class="formulario">Nome de Usuário</label><br>
					<input type="text" name="txtNome"><br>
					<label class="formulario">E-mail</label><br>
					<input type="text" name="txtEmail"><br>
					<label class="formulario">Confirmar e-mail</label><br>
					<input type="text" name="txtConfEmail"><br>
					<label class="formulario">Senha</label><br>
					<input type="password" name="txtSenha"><br>
					<label class="formulario">Confirmar Senha</label><br>
					<input type="password" name="txtConfSenha"><br>
					<select id="txtPermissao" name="txtPermissao">
						<option value="Usuario">Usuario</option>
						<option value="Empreendedor">Empreendedor</option>
					</select>
			</div>
			<div id="cadastro-form-right">

					<label class="formulario">Data de Nascimento</label><br>
					<input type="date" name="txtDtNasc"><br>
					<label class="formulario">CPF</label><br>
					<input type="text" name="txtCPF"><br>
					<label class="formulario">CEP</label><br>
					<input type="text" name="txtCEP"><br>
					<label class="formulario">Rua</label><br>
					<input type="text" name="txtRua"><br>
					<label class="formulario">Cidade</label><br>
					<input type="text" name="txtCidade"><br>
					<label class="formulario">Tipo de Endereço</label><br>
					<select id="txtTipoEndereco" name="txtTipoEndereco">
						<option value="Casa">Casa</option>
						<option value="Apartamento">Apartamento</option>
						<option value="Condominio">Condominio</option>
						<option value="Outro">Outro</option>
					</select>
					
					<br><br>
					<label class="formulario">Número</label><br>
					<input type="text" name="txtNumEndereco"><br>
				
			</div>
			<div id="cadastro-form-bottom">
				<input type="submit" value="Cadastrar" id="submit-button">
				
			</div>
				</form>
		</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>