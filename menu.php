<button type="button" id="sidebarCollapse">
	<i class="fa fa-bars"></i>
	<span class="sr-only">Toggle Menu</span>
</button>
<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<i class="fa fa-bars"></i>
</button>
<nav id="sidebar" class="active" style="position:fixed; padding-bottom:100%;">
	<a href="/Epicure/index.html" class="logo"><img src="/Epicure/images/logo_single.png" id="logotipo"></a>
    <ul class="list-unstyled components mb-5">
        <li class="active">
			<a href="/Epicure/index.php"><span class="fa fa-home"></span> Página Inicial</a>
		</li>
		<li>
			<a href="/Epicure/vagas.php"><span class="fa fa-suitcase"></span> Vagas</a>
		</li>
		<li>
			<a href="/Epicure/blog.php"><span class="fa fa-comment"></span> Dicas</a>
		</li>
		<li>
			<a href="/Epicure/index.php#Somos"><span class="fa fa-sticky-note"></span> Quem Somos</a>
		</li>
		
		<?php 
		
			session_start();
			
			if($_SESSION != NULL){
				
				echo("
				
					<li>
						<a href='/Epicure/perfil.php'><span class='fa fa-user-circle'></span> Perfil</a>
					</li>
					
				");
				
				if($_SESSION['permissaoUsuario'] == "Empreendedor"){
				
					echo("
					
						<li>
							<a href='/Epicure/cadastro-dica.php'><span class='fa fa-user-circle'></span> Dar Dica</a>
						</li>
											
					");
					
				}elseif($_SESSION['codEmpresa'] != NULL){
				
					echo("
					
						<li>
							<a href='/Epicure/cadastro-vaga.php'><span class='fa fa-user-circle'></span> Anunciar</a>
						</li>
											
					");
					
				}
				
				echo("
				
					<li>
						<a href='/Epicure/processo/sair.php'><span class='fa fa-user-times'></span> Sair</a>
					</li>
				
				");
								
			}else{
				
				echo("
				
					<li>
						<a href='/Epicure/login.php'><span class='fa fa-user-o'></span> Login</a>
					</li>
					
				");
				
			}
			
		
		?>
		
		
	</ul>
	
	
</nav>