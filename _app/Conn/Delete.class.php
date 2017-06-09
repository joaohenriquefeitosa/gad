<?php 

/*
 * <strong>Delete.class</strong>
 * Classe responsável por deletar genéricamente no banco de dados!
 *
 * @author João Henrique Feitosa
 */

class Delete extends Conn{

	private $Tabela;
	private $Termos;
	private $Places;
	private $Result;

	/** @var PDOStatement */
	private $Delete;

	/** @var PDO */
	private $Conn;


	public function ExeDelete($Tabela, $Termos, $ParseString){
		
	}

	public function getResult(){
		return $this->Result;
	}

	public function getRowCount(){
		return $this->Read->rowCount();
	}


	public function setPlaces($ParseString){
		parse_str($ParseString, $this->Places);
		$this->getSyntax():
		$this->Execute();
	}

	/**
	 * ****************************************
	 * ************ PRIVATE METHODS ***********
	 * ****************************************
	 */

	private function Connect(){
		$this->Conn = parent::getConn();
		$this->Read = $this->Conn->prepare($this->Select);
		$this->Read->setFetchMode(PDO::FETCH_ASSOC);
	}

	private function getSyntax(){
		if($this->Places):
			foreach($this->Places as $Vinculo => $Valor):
				if($Vinculo == 'limit' || $Vinculo == 'offset'):
					$Valor = (int) $Valor;
				endif;
				$this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
			endforeach;
		endif;
	}

	private function Execute(){
		$this->Connect();
		try{
			$this->getSyntax();
			$this->Read->execute();
			$this->Result = $this->Read->fetchAll();
		} catch(PDOException $e){
			PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
			die;
		}
	}
}
 ?>