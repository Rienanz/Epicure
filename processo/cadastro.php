<?php

// Inclusão da Classe Epicure

include_once '../classes/epicure.class.php';

// Declaração Objeto PDO para executar as funções da Classe Epicure

$database = new epicure;

// Declaração do valor padrão das variáveis

$nome = "";
$email = "";
$confEmail = "";
$senha = "";
$confSenha = "";
$dtNasc = "";
$cpf = "";
$imagem = "";
$permissao = "";
$cep = "";
$rua = "";
$cidade = "";
$tipoEndereco = "";
$numEndereco = "";

// Validação dos valores obtidos pelo REQUEST do formulário
    
$nome = $database->validacaoNome(htmlspecialchars($_REQUEST['txtNome']), ENT_QUOTES, 'UTF-8');
$email = $database->validacaoEmail(htmlspecialchars($_REQUEST['txtEmail'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_REQUEST['txtConfEmail']), ENT_QUOTES, 'UTF-8');
$senha = $database->validacaoSenha(htmlspecialchars($_REQUEST['txtSenha'], ENT_QUOTES, 'UTF-8'), htmlspecialchars($_REQUEST['txtConfSenha']), ENT_QUOTES, 'UTF-8');
$dtNasc = $database->validacaoDtNasc(htmlspecialchars($_REQUEST['txtDtNasc']), ENT_QUOTES, 'UTF-8');
$cpf = $database->validacaoCPF(htmlspecialchars($_REQUEST['txtCPF']), ENT_QUOTES, 'UTF-8');
$cep = $database->validacaoCEP(htmlspecialchars($_REQUEST['txtCEP']), ENT_QUOTES, 'UTF-8');
$rua = htmlspecialchars($_REQUEST['txtRua']);
$cidade = htmlspecialchars($_REQUEST['txtCidade']);
$tipoEndereco = htmlspecialchars($_REQUEST['txtTipoEndereco']);
$numEndereco = $database->validacaoNumEndereco(htmlspecialchars($_REQUEST['txtNumEndereco']), ENT_QUOTES, 'UTF-8');
$permissao = $_REQUEST['txtPermissao'];

// Execução do cadastro de usuário
	
$Resposta = $database->cadastrarUsuario($nome, $email, $dtNasc, $cpf, $senha, $imagem, $permissao, $cep, $rua, $cidade, $tipoEndereco, $numEndereco);

// Validação do cadastro

if($Resposta != NULL){
	
	return $Resposta;
	
}

?>

