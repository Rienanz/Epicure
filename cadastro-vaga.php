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
			
			if($_SESSION == NULL){

				die(header("Refresh: 0.1;url=/Epicure/index.php"));
				
			}
			
		?>


		<div id="cadastro-form">
			<div id="cadastro-title">
				<label class="cadastro-titulo">CADASTRO</label><br><br>
			</div>
				<form method="post" action="/Epicure/processo/cadastro-vaga.php">
					<label class="formulario">Titulo da Vaga</label><br>
					<input type="text" name="txtTitulo"><br>
					<label class="formulario">Tipo de Vaga</label><br>
					<select id="txtTipoVaga" name="txtTipoVaga">
						<option value="Presencial - Meio Período">Presencial - Meio Período</option>
						<option value="Presencial - Integral">Presencial - Integral</option>
						<option value="Home Office - Meio Período">Home Office - Meio Período</option>
						<option value="Home Office - Integral','Outro">Home Office - Integral','Outro</option>
					</select><br>
					<label class="formulario">Requerimentos da Vaga</label><br>
					<input type="text" name="txtRequerimentos"><br>
					<label class="formulario">Descricao de Vaga</label><br>
					<textarea id="txtVaga" name="txtVaga"></textarea><br><br>
				
				<input type="submit" value="Cadastrar Vaga" id="submit-button-login" style='text-align: center'>
				
				</form>
		</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>