<?php 

/*
 * Cadastro.class [ MODEL ]
 * Responsável por cadastrar novo usuários do sistema;
 *
 * @author João Henrique Feitosa
 */


class Cadastro{

	private $Nome;
	private $Curso;
	private $Email;
	private $Senha;
	private $Error;
	private $Result;

	function __construct(){

	}

	public function ExeCadastro(array $UserData){
		$this->Nome = (string) $UserData['user'];
		$this->Email = (string) $UserData['email'];
		$this->Curso = (string) $UserData['curso'];
		$this->Senha = (string) $UserData['pass'];

		$this->Cadastrar();

	}

	public function getError(){
		return $this->Error;
	}

	public function getResult(){
		return $this->Result;
	}

	/**
	 * ****************************************
	 * ************ PRIVATE METHODS ***********
	 * ****************************************
	 */
	private function Cadastrar(){
		$this->Senha = md5($this->Senha);

		/*
		if(!getUser()):
			$this->Error = ['Este email já esta sendo utilizado!', GD_ALERT];
		else:
			$this->Execute();
		endif;
		*/
		
		$create = new Create();

		$query= ['c_nomeprof' => $this->Nome, 'c_mailprof' => $this->Email, 'b_admiprof' => 1 , 'c_passprof' => $this->Senha];


		$create -> ExeCreate('professor', $query);

		if($create->getResult()):
			$this->Result = $create->getResult()[0];
			return true;
		else:
			return false;
		endif;

	}
	/*
	private function getUser(){
		
		$read = new Read();
		$read->ExeRead('professor', "WHERE c_mailprof = :e", "e={$this->Email}");

		if($read->getResult()):
			return true;
		else:
			return false;
		endif;

	}
	*/

	private function Execute(){
		if(!session_id()):
			session_start();
		endif;

		$this->Cadastrar();

		$_SESSION['userCadastro'] = $this->Result;
		$this->Error = ["Olá {$this->Result['c_nomeprof']}, seja bem vindo(a)."];
		$this->Result = true;

	}
}

 ?>