<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Declaração Objeto PDO para executar as funções da Classe Epicure

$database = new epicure;
session_start();

// Declaração do valor padrão das variáveis

$codEmpresa = 0;
$titulo = "";
$descricao = "";

// Validação dos valores obtidos pelo REQUEST do formulário
   
$codEmpresa = $_SESSION['codEmpresa'];
$titulo = htmlspecialchars($_REQUEST['txtTitulo']);
$tipoVaga = htmlspecialchars($_REQUEST['txtTipoVaga']);
$requerimentosVaga = htmlspecialchars($_REQUEST['txtRequerimentos']);
$descricao = htmlspecialchars($_REQUEST['txtVaga']);

// Execução do cadastro de usuário
		
$Resposta = $database->cadastrarVaga($codEmpresa, $titulo, $tipoVaga, $requerimentosVaga, $descricao);

// Validação do cadastro

if($Resposta != NULL){
	
	return $Resposta;
	
}

?>

