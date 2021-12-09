<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Declaração Objeto PDO para executar as funções da Classe Epicure

$database = new epicure;
session_start();

// Declaração do valor padrão das variáveis

$codUsuario = 0;
$titulo = "";
$descricao = "";

// Validação dos valores obtidos pelo REQUEST do formulário
   
$codUsuario = $_SESSION['codUsuario'];
$titulo = htmlspecialchars($_REQUEST['txtTitulo']);
$descricao = htmlspecialchars($_REQUEST['txtDica']);

// Execução do cadastro de usuário
		
$Resposta = $database->cadastrarDica($codUsuario, $titulo, $descricao);

// Validação do cadastro

if($Resposta != NULL){
	
	return $Resposta;
	
}

?>

