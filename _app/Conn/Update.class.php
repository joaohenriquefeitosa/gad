<?php 

/*
 * <strong>Update.class</strong>
 * Classe responsável por atualizações genéricas no banco de dados!
 *
 * @author João Henrique Feitosa
 */

class Update extends Conn{

	private $Table;
	private $Dados;
	private $Termos;
	private $Places;
	private $Result;

	/** @var PDOStatement */
	private $Update;

	/** @var PDO */
	private $Conn;

	public function ExeUpdate($Tabela, array $Dados, $Termos, $ParseString){
		$this->Tabela = (string) $Tabela;
		$this->Dados = $Dados;
		$this->Termos = (string) $Termos;

		parse_str($ParseString, $this->Places);

		$this->getSyntax();
		$this->Execute();
	}

	public function getResult(){
		return $this->Result;
	}

	public function getRowCount(){
		return $this->Update->rowCount();
	}

	public function setPlaces($ParseString){
		parse_str($ParseString, $this->Places);
		$this->getSyntax();
		$this->Execute();
	}

	/**
	 * ****************************************
	 * ************ PRIVATE METHODS ***********
	 * ****************************************
	 */

	private function Connect(){
		$this->Conn = parent::getConn();
		$this->Update = $this->Conn->prepare($this->Update);
	}

    private function getSyntax() {
        foreach ($this->Dados as $Key => $Value):
            $Places[] = $Key . ' = :' . $Key;
        endforeach;

        $Places = implode(', ', $Places);
        $this->Update = "UPDATE {$this->Tabela} SET {$Places} {$this->Termos}";
    }

	private function Execute(){
		$this->Connect();
		try{
			$this->Update->execute(array_merge($this->Dados, $this->Places));
			$this->Result = true;
		
		} catch(PDOException $e){
			PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
			die;
		}
	}
}
 ?>