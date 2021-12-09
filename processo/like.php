<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Declaração Objeto PDO para executar as funções da Classe Epicure

$database = new epicure;
session_start();

// Declaração do valor padrão das variáveis

$codEmpresa = 0;
$codUsuario = 0;

$deslike = $_REQUEST['deslike'];

die($deslike);

// Validação dos valores obtidos pelo REQUEST do formulário

if($_SESSION['codUsuario'] != NULL){
	
	$codUsuario = $_SESSION['codUsuario'];
	
	if($database->procuraLike($codUsuario)){
		
		$database->removeLike($codUsuario);
		
	}else{
		
		$database->adicionaLike($codUsuario);
		
	}
	
}

?>

