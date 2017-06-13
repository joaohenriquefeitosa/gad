<?php 

/*
 * <strong>Create.class</strong>
 * Classe responsável por cadastros genéricos no banco de dados!
 *
 * @author João Henrique Feitosa
 */

class Create extends Conn{

	private $Table;
	private $Dados;
	private $Result;

	/** @var PDOStatement */
	private $Create;

	/** @var PDO */
	private $Conn;

	/**
	 * <strong>ExeCreate:</strong> Executa um cadastro simplificado no banco de dados utilizando prepared statements.
	 * Basta informar o nome da tabela e um array atribuitivo com nome da coluna e valor.
	 *
	 * @param STRING $Tabela = Informa o nome da tabela no banco.
	 * @param ARRAY $Dados = Informa um array atribuitivo.
	 */
	public function ExeCreate($Tabela, array $Dados){
		$this->Tabela = (string) $Tabela;
		$this->Dados = $Dados;

		$this->getSyntax();
		$this->Execute();
	}

	public function getResult(){
		return $this->Result;
	}

	public function getDados(){
		return $this->Dados;
	}

	/**
	 * ****************************************
	 * ************ PRIVATE METHODS ***********
	 * ****************************************
	 */

	private function Connect(){
	 	$this->Conn = parent::getConn();
	 	$this->Create = $this->Conn->prepare($this->Create);
	}

	private function getSyntax(){
		$Fields = implode(', ', array_keys($this->Dados));
		$Places = ':' . implode(', :', array_keys($this->Dados));
		$this->Create = "INSERT INTO {$this->Tabela} ({$Fields}) VALUES ({$Places})";
	}

	private function Execute(){
		$this->Connect();
		try{
			$this->Create->execute($this->Dados);
			$this->Result = $this->Conn->lastInsertId();			
		} catch(PDOException $e){
			PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
			die;
		}
	}
}
 ?>