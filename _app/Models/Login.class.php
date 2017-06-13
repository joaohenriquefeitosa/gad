<?php 

/*
 * Login.class [ MODEL ]
 * Responsável por autenticar, validar e checar usuário do sistema;
 *
 * @author João Henrique Feitosa
 */


class Login{

	private $Level;
	private $Email;
	private $Senha;
	private $Error;
	private $Result;

	public function ExeLogin(array $UserData){
		$this->Email = (string) $UserData['user'];
		$this->Senha = (string) $UserData['pass'];
		$this->setLogin();
	}

	public function getResult(){
		return $this->Result;
	}

	public function getError(){
		return $this->Error;
	}

	public function CheckLogin(){
		if(empty($_SESSION['userlogin'])):
			unset($_SESSION['userlogin']);
			return false;
		else:
			return true;
		endif;
	}

	public function getLevel(){
		return $this->Level;
	}

	/**
	 * ****************************************
	 * ************ PRIVATE METHODS ***********
	 * ****************************************
	 */
	
	private function setLogin(){
		if(!$this->Email || !$this->Senha /*|| !Check::Email($this->Email)*/):
			$this->Error = ['Informe seu E-mail e senha para efetuar o login!', GD_ALERT];
		elseif(!$this->getUser()):
			$this->Error = ['Os dados informados não são compatíveis!', GD_ALERT];
		else:
			$this->Execute();
		endif;
	}

	private function getUser(){
		$this->Senha = md5($this->Senha);

		$read = new Read;
		$read->ExeRead(TABELA, "WHERE c_mailuser = :e AND c_passuser = :p", "e={$this->Email}&p={$this->Senha}");
		if($read->getResult()):
			$this->Result = $read->getResult()[0];
			$this->setLevel();
			
			var_dump($this->Result);
			return true;
		else:
			return false;
		endif;
	}

	private function setLevel(){
		$this->Level = (int) $this->Result["n_niveuser"];
	}

	private function Execute(){
		if(!session_id()):
			session_start();
		endif;

		$_SESSION['userlogin'] = $this->Result;
		$this->Error = ["Olá {$this->Result['c_nomeuser']}, seja bem vindo(a)."];
		$this->Result = true;
	}
}

 ?>