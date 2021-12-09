<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Início da Sessão para verificar se o usuário está logado

session_start();

// Declaração Objeto PDO para executar as funções da Classe Epicure

$database = new epicure;

// Verificação se o usuário está logado

if($_SESSION != NULL){
	
	// Chamada de função para deslogar; header redirecionando de volta para o index.php
	
	$database->exitUser();
	die(header("Refresh: 0.1;url=../index.php"));
	
}else{
	
	// Header redirecionando de volta para o index.php por não ter usuários logados
	
	die(header("Refresh: 0.1;url=../../index.php"));
	
}

?>