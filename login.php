<!doctype html>
<html lang="en">
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
	<title>Login</title>
	
</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		
		<?php 
		
			include_once './menu.php'; 
						
		?>

			<div id="form-login">
				<form method="post" action="./processo/login.php">
					<p id="login"><b>LOGIN</b></p><br>
					<label>Usuário</label><br>
					<input type="text" name="txtUsuario" placeholder="Nome do usuário" class="login"><br>
					<label>Senha</label><br>
					<input type="password" name="txtSenha" placeholder="Senha do usuário" class="login"><br>
					<a href="#" id="forgotpassword">Esqueceu a senha?</a><br>
					<input type="submit" value="ENTRAR" id="submit-button-login"><br>
					<a href="./cadastro.php" id="cadastro-link">Cadastre-se</a>
				</form>
			</div>
		
	</div>

	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>