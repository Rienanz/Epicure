<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Declaração Objeto PDO para executar as funções da Classe Epicure

$database = new epicure;

// Início da Sessão, para verificar se o usuário está logado

session_start();

if($_SESSION != NULL){
	
	die(header("Refresh: 0.1;url=/Epicure/index.php"));
	
}

// Declaração do valor padrão das variáveis

$email = "";
$senha = "";

// Obtenção e Validação dos valores do formulário
   
$email = $database->validacaoEmail($_REQUEST['txtUsuario'], $_REQUEST['txtUsuario']);
$senha = $database->validacaoSenha($_REQUEST['txtSenha'], $_REQUEST['txtSenha']);

// Confirmação da Validação dos valores

if($email && $email){
	
	// Chamada para a função Login

	$database->login($email, $senha);
	
}


?>