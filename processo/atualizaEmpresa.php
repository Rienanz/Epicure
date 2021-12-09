<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Declaração Objeto PDO para executar as funções da Classe Epicure

session_start();
$database = new epicure;

// Declaração do valor padrão das variáveis

$nome = "";
$email = "";
$senha = "";
$dtNasc = "";
$cnpj = "";
$telefone = "";
$imagem = "";
$cep = "";
$rua = "";
$cidade = "";
$tipoEndereco = "";
$numEndereco = "";

// Validação dos valores obtidos pelo REQUEST do formulário
    
$nome = $database->validacaoNome(htmlspecialchars($_REQUEST['txtNome']), ENT_QUOTES, 'UTF-8');
$email = $database->validacaoEmail(htmlspecialchars($_REQUEST['txtEmail'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_REQUEST['txtEmail']), ENT_QUOTES, 'UTF-8');
$cnpj = htmlspecialchars($_REQUEST['txtCNPJ']);
$telefone = htmlspecialchars($_REQUEST['txtTelefone']);
$cep = $database->validacaoCEP(htmlspecialchars($_REQUEST['txtCEP']), ENT_QUOTES, 'UTF-8');
$rua = htmlspecialchars($_REQUEST['txtRua']);
$cidade = htmlspecialchars($_REQUEST['txtCidade']);
$tipoEndereco = htmlspecialchars($_REQUEST['txtTipoEndereco']);
$numEndereco = $database->validacaoNumEndereco(htmlspecialchars($_REQUEST['txtNumEndereco']), ENT_QUOTES, 'UTF-8');

if($_FILES['imagem']['name'] == "" | $_FILES == NULL){
        
    $imagem = "N/A";
	
}else{
        
    $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            
}

// Execução do cadastro de usuário

$resposta = $database->alterarEmpresa($_SESSION['codEmpresa'], $nome, $email, $cnpj, $imagem, $cep, $rua, $cidade, $tipoEndereco, $numEndereco);

// Validação do cadastro

if($resposta != NULL){
	
	return $resposta;
	
}

?>

