<?php 

/*
 * <strong>Read.class</strong>
 * Classe responsável por leituras genéricas no banco de dados!
 *
 * @author João Henrique Feitosa
 */

class Read extends Conn{

	private $Select;
	private $Places;
	private $Result;

	/** @var PDOStatement */
	private $Read;

	/** @var PDO */
	private $Conn;


	/**
     * <b>Exe Read:</b> Executa uma leitura simplificada com Prepared Statments. Basta informar o nome da tabela,
     * os termos da seleção e uma analize em cadeia (ParseString) para executar.
     * @param STRING $Tabela = Nome da tabela
     * @param STRING $Termos = WHERE | ORDER | LIMIT :limit | OFFSET :offset
     * @param STRING $ParseString = link={$link}&link2={$link2}
     */
	public function ExeRead($Tabela, $Termos = null, $ParseString = null){
		if(!empty($ParseString)):
			parse_str($ParseString, $this->Places);
		endif;
		$this->Select = "SELECT * FROM {$Tabela} {$Termos}";
		$this->Execute();
	}

	public function getResult(){
		return $this->Result;
	}

	public function getRowCount(){
		return $this->Read->rowCount();
	}

	public function FullRead($Query, $ParseString = null){
		$this->Select = (string) $Query;
		if(!empty($ParseString)):
			parse_str($ParseString, $this->Places);
		endif;
		$this->Execute();
	}

	public function setPlaces($ParseString){
		parse_str($ParseString, $this->Places);
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

	}

	private function Execute(){
		$this->Connect();
		try{
	
		} catch(PDOException $e){
			PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
			die;
		}
	}
}
 ?>