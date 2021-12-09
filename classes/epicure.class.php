<?php

class epicure{
	
	// Informações de acesso ao banco de dados
    
    private $server = 'localhost';
    private $DB = 'epicure';
    private $user = 'root';
    private $pass = '';
    private $PDO = NULL;
    
/* Fun��es do Sistema */

	// Conectar no BD
    
    public function openConexao(){
        
        $this->PDO = new PDO("mysql:host={$this->server};dbname={$this->DB}", $this->user, $this->pass);
        
        if($this->PDO){
            
            return true;
            
        }
        
        else{
            
            return "Erro de Conex�o! Por favor, verifique com o administrador da rede.";
            
        }
        
    }
	
	// Desconectar do BD
    
    public function exitConexao(){
        
        $this->PDO = NULL;
        
    }
    
    
/* Fun��es de Cadastro */
    
    public function cadastrarUsuario($nome, $email, $dtNasc, $cpf, $senha, $imagem, $permissao, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
                
        if($this->openConexao() == true){
                        
            $SQL = "INSERT INTO usuario (NomeUsuario, EmailUsuario, NascimentoUsuario, CPFUsuario, SenhaUsuario, ImagemUsuario, PermissaoUsuario) VALUES (:nome, :email, :nascimento, :cpf, :senha, :imagem, :permissao)";
            
			// Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":nome", $nome, PDO::PARAM_STR);
            $Processo->bindParam(':email', $email, PDO::PARAM_STR);
            $Processo->bindParam(':nascimento', $dtNasc, PDO::PARAM_STR);
            $Processo->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $Processo->bindParam(':senha', $senha, PDO::PARAM_STR);
            $Processo->bindParam(':imagem', $imagem, PDO::PARAM_STR);
            $Processo->bindParam(':permissao', $permissao, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço do usuário
                
                $this->cadastrarEnderecoUsuario($email, $cep, $rua, $cidade, $tipoEndereco, $numEndereco);
                echo("<script>alert('Empresa cadastrada com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/dashboard/dashboard.php"));
				
            }
            
        }
        
    }
    
    public function cadastrarEnderecoUsuario($email, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
        
        if($this->openConexao() == true){
			
			// Chamada de função para obter o código de usuário pelo seu email
                        
            $codUsuario = $this->procuraEmailUsuario($email);
            
            $SQL = "INSERT INTO enderecousuario (CodUsuario, RuaEnderecoUsuario, CidadeEnderecoUsuario, TipoEnderecoUsuario, NumEnderecoUsuario, CEPEnderecoUsuario) VALUES (:codUsuario, :ruaEnderecoUsuario, :cidadeEnderecoUsuario, :tipoEnderecoUsuario, :numEnderecoUsuario, :cepEnderecoUsuario)";
			
			// Binding de valores para rodar ao lado do SQL
			
			$Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codUsuario", $codUsuario, PDO::PARAM_STR);
            $Processo->bindParam(':ruaEnderecoUsuario', $rua, PDO::PARAM_STR);
            $Processo->bindParam(':cidadeEnderecoUsuario', $cidade, PDO::PARAM_STR);
            $Processo->bindParam(':tipoEnderecoCidade', $tipoEndereco, PDO::PARAM_STR);
            $Processo->bindParam(':numEnderecoUsuario', $numEndereco, PDO::PARAM_STR);
            $Processo->bindParam(':cepEnderecoUsuario', $cep, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
                $this->exitConexao();
                
            }
            
        }
        
    }
	
	public function cadastrarEmpresa($nome, $email, $senha, $telefone, $cnpj, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
        
        if($this->openConexao() == true){
			
			// Chamada de função para obter o código de empresa pelo seu email
                                
            $SQL = "INSERT INTO empresa (NomeEmpresa, CNPJEmpresa, EmailEmpresa, TelefoneEmpresa, SenhaEmpresa) VALUES (:nome, :cnpj, :email, :telefone, :senha)";
			

			// Binding de valores para rodar ao lado do SQL
			
			$Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":nome", $nome, PDO::PARAM_STR);
			$Processo->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
            $Processo->bindParam(':email', $email, PDO::PARAM_STR);
            $Processo->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $Processo->bindParam(':senha', $senha, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço da empresa
                
                $this->cadastrarEnderecoEmpresa($email, $cep, $rua, $cidade, $tipoEndereco, $numEndereco);
                echo("<script>alert('Empresa cadastrada com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/dashboard/dashboard.php"));
				
                
            }
            
        }
        
    }
	
	public function cadastrarEnderecoEmpresa($email, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
        
        if($this->openConexao() == true){
			
			// Chamada de função para obter o código de usuário pelo seu email
                        
            $codEmpresa = $this->procuraEmailEmpresa($email);
			            
            $SQL = "INSERT INTO enderecoempresa (CodEmpresa, RuaEnderecoEmpresa, CidadeEnderecoEmpresa, TipoEnderecoEmpresa, NumEnderecoEmpresa, CEPEnderecoEmpresa) VALUES (:codEmpresa, :ruaEnderecoEmpresa, :cidadeEnderecoEmpresa, :tipoEnderecoCidade, :numEnderecoEmpresa, :cepEnderecoEmpresa)";
			
			// Binding de valores para rodar ao lado do SQL
			
			$Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codEmpresa", $codEmpresa, PDO::PARAM_STR);
            $Processo->bindParam(':ruaEnderecoEmpresa', $rua, PDO::PARAM_STR);
            $Processo->bindParam(':cidadeEnderecoEmpresa', $cidade, PDO::PARAM_STR);
            $Processo->bindParam(':tipoEnderecoCidade', $tipoEndereco, PDO::PARAM_STR);
            $Processo->bindParam(':numEnderecoEmpresa', $numEndereco, PDO::PARAM_STR);
            $Processo->bindParam(':cepEnderecoEmpresa', $cep, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				                
                $this->exitConexao();
                
            }
            
        }
        
    }
	
	public function cadastrarDica($codUsuario, $titulo, $descricao){
                
        if($this->openConexao() == true){
                        
            $SQL = "INSERT INTO dicas (CodUsuario, TituloDicas, DescricaoDicas) VALUES (:codUsuario, :titulo, :descricao)";
            			
			// Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codUsuario", $codUsuario, PDO::PARAM_STR);
            $Processo->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $Processo->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço do usuário
                $this->exitConexao();
                echo("<script>alert('Cadastrado com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/index.php"));    
				
            }
            
        }
        
    }
	
	public function cadastrarVaga($codEmpresa, $titulo, $tipoVaga, $requerimentosVaga, $descricao){
                
        if($this->openConexao() == true){
                        
            $SQL = "INSERT INTO vagas (CodEmpresa, TituloVaga, TipoVaga, DescricaoVaga, RequerimentosVaga) VALUES (:codEmpresa, :titulo, :tipoVaga, :descricao, :requerimentosVaga)";
            			
			// Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codEmpresa", $codEmpresa, PDO::PARAM_STR);
			$Processo->bindParam(":titulo", $titulo, PDO::PARAM_STR);
			$Processo->bindParam(":tipoVaga", $tipoVaga, PDO::PARAM_STR);
            $Processo->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $Processo->bindParam(':requerimentosVaga', $requerimentosVaga, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço do usuário
                $this->exitConexao();
                echo("<script>alert('Cadastrado com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/index.php"));    
				
            }
            
        }
        
    }
	
	public function adicionaLike($codUsuario){
                
        if($this->openConexao() == true){
                        
            $SQL = "INSERT INTO AvaliacaoDicas (CodUsuario, NotaAvalicao) VALUES (:codUsuario, :nota)";
            			
			// Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codUsuario", $codUsuario, PDO::PARAM_STR);
			$Processo->bindParam(":nota", '1', PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço do usuário
                $this->exitConexao();
                echo("<script>alert('Cadastrado com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/index.php"));    
				
            }
            
        }
        
    }
	
/* Login */
	
	public function login($email, $senha){
            
        if($this->openConexao()){
            
            $SQL = "SELECT *FROM usuario WHERE EmailUsuario = :email AND SenhaUsuario = :senha";
            
            // Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":email", $email, PDO::PARAM_STR);
            $Processo->bindParam(':senha', $senha, PDO::PARAM_STR);
			            
            try{
                
                // Execução do SQL; Fetch de dados pelo SELECT
				
                $Processo->execute();
                $info = $Processo->fetch(PDO::FETCH_ASSOC);
				                                
                if($info == NULL){
                    
					// Validação dos dados; Mensagem de Erro
					$this->loginEmpresa($email, $senha);
                    
                }
                
                
            }catch (Exception $ex){
                
                // Catch de erros
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
                
                $this->exitConexao();
                echo("<script>alert('Login efetuado com sucesso!');</script>");
                $this->Sessao($info);
                die(header("Refresh: 0.11;url=/Epicure/perfil.php"));
                
            }
            
        }
        
    }
	
	public function loginEmpresa($email, $senha){
                        
		$SQL = "SELECT CodEmpresa, NomeEmpresa, CNPJEmpresa, EmailEmpresa, TelefoneEmpresa, ImagemEmpresa FROM empresa WHERE EmailEmpresa = :email AND SenhaEmpresa = :senha";
		
		// Binding de valores para rodar ao lado do SQL
		
		$Processo = $this->PDO->prepare($SQL);
		$Processo->bindParam(":email", $email, PDO::PARAM_STR);
		$Processo->bindParam(':senha', $senha, PDO::PARAM_STR);
					
		try{
			
			// Execução do SQL; Fetch de dados pelo SELECT
			
			$Processo->execute();
			$info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação dos dados; Mensagem de Erro
							
			if($info == NULL){
				
				$this->mensagemErro("Login");
				
			}
			
			
		}catch (Exception $ex){
			
			// Catch de erros
			
			$this->mensagemErro($ex->getMessage());
			
		}finally{
			
			// Desconexão do BD; Chamada de função para criar a SESSION; Redirecionamento para o index.php
			
			$this->exitConexao();
			echo("<script>alert('Login de Empresa efetuado com sucesso!');</script>");
			$this->Sessao($info);
			die(header("Refresh: 0.11;url=/Epicure/perfil-empresa.php"));
			
		}
                    
    }
	
/* Alteração de Dados */

	public function alterarUsuario($codUsuario, $nome, $email, $cpf, $imagem, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
            
        if($this->openConexao()){
			   
            if($imagem == "N/A"){
            
                $SQL = "UPDATE usuario SET NomeUsuario = :nomeUsuario, EmailUsuario = :emailUsuario, CPFUsuario = :cpfUsuario WHERE CodUsuario = :codUsuario";

                $Processo = $this->PDO->prepare($SQL);
            
            }else{
                
                $SQL = "UPDATE usuario SET NomeUsuario = :nomeUsuario, EmailUsuario = :emailUsuario, CPFUsuario = :cpfUsuario, ImagemUsuario = :imagem WHERE CodUsuario = :codUsuario";
                
                $Processo = $this->PDO->prepare($SQL);
                $Processo->bindParam(':imagem', $imagem, PDO::PARAM_STR);
               
            }
					                            
            $Processo->bindParam(":codUsuario", $codUsuario, PDO::PARAM_STR);
            $Processo->bindParam(":nomeUsuario", $nome, PDO::PARAM_STR);
            $Processo->bindParam(":emailUsuario", $email, PDO::PARAM_STR);
            $Processo->bindParam(':cpfUsuario', $cpf, PDO::PARAM_STR);
            
            $Processo->execute();
			
			$this->alterarEnderecoUsuario($codUsuario, $cep, $rua, $cidade, $tipoEndereco, $numEndereco);
			
            $this->exitConexao();
		
            die(header("Refresh: 0.1;url=/Epicure/perfil-profissional.php"));
                
            
        }
        
    }
	
	public function alterarEnderecoUsuario($codUsuario, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
            
        if($this->openConexao()){
			 
			$SQL = "UPDATE enderecousuario SET CEPEnderecoUsuario = :cepEndereco, RuaEnderecoUsuario = :ruaEndereco, CidadeEnderecoUsuario = :cidadeEndereco, TipoEnderecoUsuario = :tipoEndereco, NumEnderecoUsuario = :numEndereco WHERE CodUsuario = :codUsuario";
			$Processo = $this->PDO->prepare($SQL);
			
            $Processo->bindParam(":codUsuario", $codUsuario, PDO::PARAM_STR);				                            
			$Processo->bindParam(":cepEndereco", $cep, PDO::PARAM_STR);
            $Processo->bindParam(":ruaEndereco", $rua, PDO::PARAM_STR);
            $Processo->bindParam(":cidadeEndereco", $cidade, PDO::PARAM_STR);
            $Processo->bindParam(":tipoEndereco", $tipoEndereco, PDO::PARAM_STR);
            $Processo->bindParam(':numEndereco', $numEndereco, PDO::PARAM_STR);
            
            $Processo->execute();              
            
        }
        
    }
	
	public function alterarEmpresa($codEmpresa, $nome, $email, $cnpj, $imagem, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
            
        if($this->openConexao()){
			   
            if($imagem == "N/A"){
            
                $SQL = "UPDATE empresa SET NomeEmpresa = :nomeEmpresa, EmailEmpresa = :emailEmpresa, CNPJEmpresa = :cnpjEmpresa WHERE CodEmpresa = :codEmpresa";

                $Processo = $this->PDO->prepare($SQL);
            
            }else{
                
                $SQL = "UPDATE empresa SET NomeEmpresa = :nomeEmpresa, EmailEmpresa = :emailEmpresa, CNPJEmpresa = :cnpjEmpresa, ImagemEmpresa = :imagem WHERE CodEmpresa = :codEmpresa";
                
                $Processo = $this->PDO->prepare($SQL);
                $Processo->bindParam(':imagem', $imagem, PDO::PARAM_STR);
               
            }
								                            
            $Processo->bindParam(":codEmpresa", $codEmpresa, PDO::PARAM_STR);
            $Processo->bindParam(":nomeEmpresa", $nome, PDO::PARAM_STR);
            $Processo->bindParam(":emailEmpresa", $email, PDO::PARAM_STR);
            $Processo->bindParam(':cnpjEmpresa', $cnpj, PDO::PARAM_STR);
            
            $Processo->execute();
			
			$this->alterarEnderecoEmpresa($codEmpresa, $cep, $rua, $cidade, $tipoEndereco, $numEndereco);
			
            $this->exitConexao();
		
            die(header("Refresh: 0.1;url=/Epicure/perfil-profissional.php"));
                
            
        }
        
    }
	
	public function alterarEnderecoEmpresa($codEmpresa, $cep, $rua, $cidade, $tipoEndereco, $numEndereco){
            
        if($this->openConexao()){
			 
			$SQL = "UPDATE enderecoempresa SET CEPEnderecoEmpresa = :cepEndereco, RuaEnderecoEmpresa = :ruaEndereco, CidadeEnderecoEmpresa = :cidadeEndereco, TipoEnderecoEmpresa = :tipoEndereco, NumEnderecoEmpresa = :numEndereco WHERE CodEmpresa = :codEmpresa";
			$Processo = $this->PDO->prepare($SQL);
			
            $Processo->bindParam(":codEmpresa", $codEmpresa, PDO::PARAM_STR);				                            
			$Processo->bindParam(":cepEndereco", $cep, PDO::PARAM_STR);
            $Processo->bindParam(":ruaEndereco", $rua, PDO::PARAM_STR);
            $Processo->bindParam(":cidadeEndereco", $cidade, PDO::PARAM_STR);
            $Processo->bindParam(":tipoEndereco", $tipoEndereco, PDO::PARAM_STR);
            $Processo->bindParam(':numEndereco', $numEndereco, PDO::PARAM_STR);
            
            $Processo->execute();              
            
        }
        
    }
	
/* Exclusão de Dados */

	public function excluirVaga($codVaga){
                
        if($this->openConexao() == true){
                        
            $SQL = "DELETE FROM vagas WHERE CodVaga = :codVaga";
            			
			// Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codVaga", $codVaga, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço do usuário
                $this->exitConexao();
                echo("<script>alert('Excluido com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/index.php"));    
				
            }
            
        }
        
    }
	
	public function excluirDica($codDicas){
                
        if($this->openConexao() == true){
                        
            $SQL = "DELETE FROM dicas WHERE CodDicas = :codDicas";
            			
			// Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codDicas", $codDicas, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço do usuário
                $this->exitConexao();
                echo("<script>alert('Excluido com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/index.php"));    
				
            }
            
        }
        
    }
	
	public function removeLike($codUsuario){
                
        if($this->openConexao() == true){
                        
            $SQL = "DELETE FROM AvaliacaoDicas WHERE CodUsuario = :codUsuario";
            			
			// Binding de valores para rodar ao lado do SQL
			
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codUsuario", $CodUsuario, PDO::PARAM_STR);
            
            try{
                // Execução do valor de $SQL
				
                $Processo->execute();
                
            }catch (Exception $ex){
				
				// Catch de erros durante o processo
                
                $this->mensagemErro($ex->getMessage());
                
            }finally{
				
				// Cadastro do endereço do usuário
                $this->exitConexao();
                echo("<script>alert('Excluido com sucesso!');</script>");
                die(header("Refresh: 0.11;url=/Epicure/index.php"));    
				
            }
            
        }
        
    }
   	
/* Busca de Dados */

	public function totalUsuarios(){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM usuario";
            
            $Processo = $this->PDO->prepare($SQL);
            
            $Processo->execute();
            $total = $Processo->rowCount();
            $this->exitConexao();
            
        }
        
        return $total;
       
	}
	
	public function totalEmpresas(){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM usuario";
            
            $Processo = $this->PDO->prepare($SQL);
            
            $Processo->execute();
            $total = $Processo->rowCount();
            $this->exitConexao();
            
        }
        
        return $total;
       
	}

	public function procuraUsuarios(){
        
        if($this->openConexao()){
            
            $SQL = "SELECT *FROM usuario";
			
			// Binding de valores para rodar ao lado do SQL
            
            $Processo = $this->PDO->prepare($SQL);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetchall(PDO::FETCH_ASSOC);
			
			// Validação da informação; Redirecionamento para o cadastro.php
            
            if($info == NULL){
                
                $this->Erro("Não há usuários");
                die(header("Refresh: 0.1;url=/Epicure/index.php"));
                
            }
            
            // Retorno das informações obtidas sobre o usuário
			
            return $info;
                            
        }
        
    }
	
	public function procuraEmpresas(){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM empresa";
			
			// Binding de valores para rodar ao lado do SQL
            
            $Processo = $this->PDO->prepare($SQL);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação da informação; Redirecionamento para o cadastro.php
            
            if($info == NULL){
                
                $this->Erro("Não há empresas");
                die(header("Refresh: 0.1;url=/Epicure/index.php"));
                
            }
            
            // Retorno das informações obtidas sobre o usuário
			
            return $info;
                            
        }
        
    }

	public function procuraUsuario($id){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM usuario WHERE CodUsuario = :id";
			
			// Binding de valores para rodar ao lado do SQL
            
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":id", $id, PDO::PARAM_STR);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação da informação; Redirecionamento para o cadastro.php
            
            if($info == NULL){
                
                $this->Erro("Usuário não encontrado");
                die(header("Refresh: 0.1;url=/Epicure/index.php"));
                
            }
            
            // Retorno das informações obtidas sobre o usuário
			
            return $info;
                            
        }
        
    }
	
	public function procuraEmpresa($id){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM empresa WHERE CodEmpresa = :id";
			
			// Binding de valores para rodar ao lado do SQL
            
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":id", $id, PDO::PARAM_STR);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação da informação; Redirecionamento para o cadastro.php
            
            if($info == NULL){
                
                $this->Erro("Empresa não encontrada");
                die(header("Refresh: 0.1;url=/Epicure/index.php"));
                
            }
            
            // Retorno das informações obtidas sobre o usuário
			
            return $info;
                            
        }
        
    }
	
	public function procuraEmailUsuario($email){

		$SQL = "SELECT CodUsuario FROM usuario WHERE EmailUsuario = :email";
            
		// Binding de valores para rodar ao lado do SQL
			
		$Processo = $this->PDO->prepare($SQL);
		$Processo->bindParam(":email", $email, PDO::PARAM_STR);
		
		// Execução do SQL
						
		$Processo->execute();
		$info = $Processo->fetch(PDO::FETCH_ASSOC);
		
		// Validação das informações; Redirecionamento para o index.php
		
		if($info == NULL){
			
			$this->Erro("Email do Usuário não encontrado");
			die(header("Refresh: 0.1;url=/Epicure/cadastro.php"));
			
		}
		
		// Retorno do Código do Usuário

		return $info['CodUsuario'];

	}
	
	public function procuraEmailEmpresa($email){

		$SQL = "SELECT CodEmpresa FROM empresa WHERE EmailEmpresa = :email";
            
		// Binding de valores para rodar ao lado do SQL
			
		$Processo = $this->PDO->prepare($SQL);
		$Processo->bindParam(":email", $email, PDO::PARAM_STR);
		
		// Execução do SQL
						
		$Processo->execute();
		$info = $Processo->fetch(PDO::FETCH_ASSOC);
		
		// Validação das informações; Redirecionamento para o index.php
		
		if($info == NULL){
			
			$this->Erro("Email da Empresa não encontrado");
			die(header("Refresh: 0.1;url=/Epicure/cadastro-empresa.php"));
			
		}
		
		// Retorno do Código do Usuário

		return $info['CodEmpresa'];

	}
	
	public function procuraEnderecoUsuario($id){
		
		if($this->openConexao()){
            
            $SQL = "SELECT * FROM enderecousuario WHERE CodUsuario = :id";
			
			// Desconexão do BD; Redirecionamento para o index.php
            
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":id", $id, PDO::PARAM_STR);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação das informações; Redirecionamento para o index.php
            
            if($info == NULL){
                
                $this->Erro("Endereço da Empresa não encontrado");
                die(header("Refresh: 0.1;url=/Epicure/index.php"));
                
            }
			
			// Retorno das informações            

            return $info;

        }
		
	}
	
	public function procuraEnderecoEmpresa($id){
		
		if($this->openConexao()){
            
            $SQL = "SELECT * FROM enderecoempresa WHERE CodEmpresa = :id";
			
			// Desconexão do BD; Redirecionamento para o index.php
            
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":id", $id, PDO::PARAM_STR);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação das informações; Redirecionamento para o index.php
            
            if($info == NULL){
                
                $this->Erro("Endereço da Empresa não encontrado");
                die(header("Refresh: 0.1;url=/Epicure/index.php"));
                
            }
			
			// Retorno das informações            

            return $info;

        }
		
	}
	
	public function procuraDetalhesUsuario($id){
		
		if($this->openConexao()){
            
            $SQL = "SELECT * FROM detalhesempregado WHERE CodUsuario = :id";
			
			// Binding de valores para rodar ao lado do SQL
            
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":id", $id, PDO::PARAM_STR);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação das informações
            
            if($info == NULL){
                
                $this->Erro("Endereço do Usuário não encontrado");
                die(header("Refresh: 0.1;url=/Epicure/cadastro.php"));
                
            }
            
			// Retorno dos dados obtidos
					
            return $info;
                            
        }
		
	}
	
	public function procuraVagas(){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM vagas";
			
			// Preparação da linha de comando SQL dentro do objeto

            $Processo = $this->PDO->prepare($SQL);
			
			// Execução do SQL
            
            $Processo->execute();
            $info = $Processo->fetchall(PDO::FETCH_ASSOC);
			
			// Desconexão do BD
			
            $this->exitConexao();
        }
		
		// Retorno de Informações
        
        return $info;        
        
    }
	
	public function procuraVaga($codVaga){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM vagas WHERE CodVaga = :codVaga";
			
			// Preparação da linha de comando SQL dentro do objeto

            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codVaga", $codVaga, PDO::PARAM_STR);
			
			// Execução do SQL
            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Desconexão do BD
			
            $this->exitConexao();
        }
		
		// Retorno de Informações
        
        return $info;        
        
    }
	
	public function procuraDicas(){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM dicas";
			
			// Preparação da linha de comando SQL dentro do objeto

            $Processo = $this->PDO->prepare($SQL);
			
			// Execução do SQL
            
            $Processo->execute();
            $info = $Processo->fetchall(PDO::FETCH_ASSOC);
			
			// Desconexão do BD
			
            $this->exitConexao();
        }
		
		// Retorno de Informações
        
        return $info;        
        
    }
	
	public function procuraDica($codDica){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM dicas WHERE CodDicas = :codDica";
			
			// Preparação da linha de comando SQL dentro do objeto

            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":codDica", $codDica, PDO::PARAM_STR);
			
			// Execução do SQL
            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Desconexão do BD
			
            $this->exitConexao();
        }
		
		// Retorno de Informações
        
        return $info;        
        
    }
	
	public function procuraLike($id){
        
        if($this->openConexao()){
            
            $SQL = "SELECT * FROM AvaliacaoDicas WHERE CodUsuario = :id";
			
			// Binding de valores para rodar ao lado do SQL
            
            $Processo = $this->PDO->prepare($SQL);
            $Processo->bindParam(":id", $id, PDO::PARAM_STR);
			
			// Execução do SQL
                            
            $Processo->execute();
            $info = $Processo->fetch(PDO::FETCH_ASSOC);
			
			// Validação da informação; Redirecionamento para o cadastro.php
            
            if($info == NULL){
                
                $this->Erro("Like não encontrado");
                die(header("Refresh: 0.1;url=/Epicure/index.php"));
                
            }
            
            // Retorno das informações obtidas sobre o usuário
			
            return $info;
                            
        }
        
    }


/* Fun��es de Valida��o */

    public function validacaoNome($nome){
        
        $nome = htmlspecialchars_decode($nome);
        
        if($nome == NULL || $nome == '' || strlen($nome) > 60){
            
            $this->mensagemErro("Nome");
                        
        }
        
        return $nome;
        
    }
	
	public function validacaoImagem($imagem, $extensao){
              
        list($Altura, $Largura) = getimagesize($imagem);
        
        if($Altura == "" || $Largura == ""){
        
            $this->Erro("imagem");
            
        }
        
        $Extensoes = array(
            
            'image/gif',
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/tiff',
            'image/tif',
            'image/bmp'
            
        );
              
        if (!in_array($extensao, $Extensoes)){
            
            $this->Erro("Extensão da Imagem");
            
        }
                
    }
    
    public function validacaoEmail($email, $confEmail){
        
        $email = htmlspecialchars_decode($email);
        $confEmail = htmlspecialchars_decode($confEmail);

        if($email == NULL || $email == '' || strlen($email) > 100){
            
            $this->mensagemErro("Email");
            
        }else{
            
            if($email != $confEmail){
                
                $this->mensagemErro("Email");
                
            }
            
            
            
        }
        
        return $email;
        
    }
    
    public function validacaoSenha($senha, $confSenha){
        
        $senha = htmlspecialchars_decode($senha);
        $confSenha = htmlspecialchars_decode($confSenha);
        
        if($senha == NULL || $senha == '' || strlen($senha) > 50){
            
            $this->mensagemErro('Senha');
            
        }else{
            
            if($senha != $confSenha){
                
                $this->mensagemErro("Senha");
                
            }
            
        }
        
        return md5($senha);
        
    }
	
    public function validacaoDtNasc($dtNasc){
        
	    return $dtNasc;
	    
    }
    
    public function validacaoCPF($cpf){
        
        $cpf = htmlspecialchars_decode($cpf);
        
        $cpf = str_replace("-", "", $cpf);
        $cpf = str_replace(".", "", $cpf);
        
        if($cpf == NULL || $cpf == "" || strlen($cpf) != 11){
            
            $this->mensagemErro('CPF');
            
        }
        
        $cpf = substr_replace($cpf, ".", 3, 0);
        $cpf = substr_replace($cpf, ".", 7, 0);
        $cpf = substr_replace($cpf, "-", 11, 0);
        return $cpf;
        
    }

    public function validacaoCEP($cep){
        
        $cep = htmlspecialchars_decode($cep);
        
        $cep = str_replace("-", "", $cep);
        
        if($cep == NULL || $cep == "" || strlen($cep) != 8){
            
            $this->mensagemErro('CEP');
            
        }
        
        $cep = substr_replace($cep, "-", 5, 0);
        return $cep;
        
    }
    
    public function validacaoNumEndereco($numEndereco){
        
        $numEndereco = htmlspecialchars_decode($numEndereco);
        
        if($numEndereco == NULL || $numEndereco == '' || strlen($numEndereco) > 10){
            
            $this->mensagemErro("N�mero da Resid�ncia");
            
        }
        
        return $numEndereco;
        
    }
    
    public function mensagemErro($erro){
        
        if($erro == "Login"){
            
            echo("<script>alert('Login e/ou Senha incorretos!')</script>");
            die(header("Refresh: 0.11;url=/Epicure/index.php"));
            
        }
        
        echo("<script>alert('Informe Corretamente o/a {$erro}!')</script>");
        die(header("Refresh: 0.11;url=/Epicure/cadastro.php"));
        
    }
    
    public function Sessao($info){
		
		// Inícialização da SESSION
		
		session_start();
		
		// Verificação de tipo de usuário
		        		
		if($info['PermissaoUsuario'] == 'Usuario' || $info['PermissaoUsuario'] == 'Empreendedor' || $info['PermissaoUsuario'] == 'Admin'){
			
			//Atribuição de informações obtidas no login de usuário, empreendedor e administrador para a SESSION
			
			$_SESSION['codUsuario'] = $info['CodUsuario'];
			$_SESSION['nomeUsuario'] = $info['NomeUsuario'];
			$_SESSION['emailUsuario'] = $info['EmailUsuario'];
			$_SESSION['nascimentoUsuario'] = $info['NascimentoUsuario'];
			$_SESSION['cpfUsuario'] = $info['CPFUsuario'];
			$_SESSION['imagem'] = $info['ImagemUsuario'];
			$_SESSION['permissaoUsuario'] = $info['PermissaoUsuario'];
						
		}elseif($info['CodEmpresa'] != NULL){
			
			//Atribuição de informações obtidas no login de empresa para a SESSION
			$_SESSION['codEmpresa'] = $info['CodEmpresa'];
			$_SESSION['nomeEmpresa'] = $info['NomeEmpresa'];
			$_SESSION['cnpjEmpresa'] = $info['CNPJEmpresa'];
			$_SESSION['emailEmpresa'] = $info['EmailEmpresa'];
			$_SESSION['telefoneEmpresa'] = $info['TelefoneEmpresa'];
			$_SESSION['imagem'] = $info['ImagemEmpresa'];
			
		}
                
    }
	
	public function exitUser(){
		
		// Remoção dupla de valores da SESSION, para garantir que dados não sejam perdidos ou roubados
        
        session_destroy();
        $_SESSION = NULL;
        
    }
    
}