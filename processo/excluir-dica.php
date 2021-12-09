<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Declaração Objeto PDO para executar as funções da Classe Epicure

$database = new epicure;
session_start();

// Declaração do valor padrão das variáveis

$codEmpresa = 0;

// Validação dos valores obtidos pelo REQUEST do formulário
   
$codDica = str_replace("/Epicure/processo/excluir-dica.php?vg=", "", $_SERVER["REQUEST_URI"]);

// Execução do cadastro de usuário
		
$Resposta = $database->excluirDica($codDica);

// Validação do cadastro

if($Resposta != NULL){
	
	return $Resposta;
	
}

?>

