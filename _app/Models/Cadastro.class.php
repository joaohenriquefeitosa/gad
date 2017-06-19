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
	private $Nivel;
	private $Error;
	private $Result;
	private $LastID;

	function __construct($Level){
		$this->Nivel = (int) $Level;
	}

	public function ExeCadastro(array $UserData){
		$this->Nome = (string) $UserData['user'];
		$this->Email = (string) $UserData['email'];
		$this->Curso = !empty($UserData['curso']) ? $UserData['curso'] : null;
		$this->Senha = (string) $UserData['pass'];

		$this->Execute();
		

	}

	public function getError(){
		return $this->Error;
	}

	public function getResult(){
		return $this->Result;
	}

	public function getLastId(){
		return $this->LastID;
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

		$query= ['c_nomeuser' => $this->Nome,
				 'c_mailuser' => $this->Email,
				 'n_niveuser' => $this->Nivel, 
				 'c_passuser' => $this->Senha];

		$create -> ExeCreate(TABELA, $query);

		$this->LastID = $create ->getLastId();

		if($create->getResult()):
			$this->Result = $create->getResult()[0];
			return true;
		else:
			return false;
		endif;

	}

	private function Matricular(){
		$query = ['n_numeuser' => $this->LastID,
				  'n_numecurs' => $this->Curso];


		$create = new Create();
		$create -> ExeCreate('matriculado', $query);
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
		$this->Matricular();

		$_SESSION['userCadastro'] = $this->Result;
		$this->Error = ["Olá {$this->Result['c_nomeuser']}, seja bem vindo(a)."];
		$this->Result = true;

	}
}

 ?>