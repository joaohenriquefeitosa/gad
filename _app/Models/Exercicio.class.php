<?php 

/*
 * Exercicio.class [ MODEL ]
 * Responsável por cadastrar novo usuários do sistema;
 *
 * @author João Henrique Feitosa
 */


class Exercicio{
	
	private $Data;
	private $ID;
	private $Enunciado;
	private $A;
	private $B;
	private $C;
	private $D;
	private $E;
	private $Correta;
	private $Result;
	private $Error;
	private $ListaContainer;
	private $LastID;
	private $Query;


	public function ExeExercicio($ListaContainer, array $Dados){
		$this->ListaContainer = $ListaContainer;

		$this->Data = $Dados;

		if(in_array('', $this->Data)):
			$this->Result = false;
			//$this->Error = ['<strong>Erro ao Adicionar: Para adicionar um novo curso, preencha todos os campos</strong>', ALERT];
		else:
			$this->setExercicio();
			
			$this->Execute();

			$this->setArmazenamento();
		endif;

	}

	public function getResult(){
		return $this->Result;
	}

	public function getError(){
		return $this->Error;
	}


	/////////////////////////////////////////////////////////
	//////////////// PRIVATE METHODS ////////////////////////
	/////////////////////////////////////////////////////////

	private function setExercicio(){
		$this->Enunciado = $this->Data['enunciado'];
		$this->A = $this->Data['opA'];
		$this->B = $this->Data['opB'];
		$this->C = $this->Data['opC'];
		$this->D = $this->Data['opD'];
		$this->E = $this->Data['opE'];
		$this->Correta = $this->Data['correta'];

		$this->Query = ['c_enumexer' => $this->Enunciado,
						'c_altaexer' => $this->A,
						'c_altbexer' => $this->B,
						'c_altcexer' => $this->C,
						'c_altdexer' => $this->D,
						'c_alteexer' => $this->E,
						'c_correxer' => $this->Correta];

	}

	private function setArmazenamento(){
		$arm = ['n_numelist' => $this->ListaContainer, 'n_numeexer' => $this->LastID];
		$Create = new Create;
		$Create -> ExeCreate('armazena', $arm);

	}

	private function Execute(){
		$Create = new Create;
		$Create -> ExeCreate('exercicio', $this->Query);
		$this->LastID = $Create->getLastId();
		if($Create->getResult()):
			$this->Result = $Create->getResult();
			$this->setArmazenamento();
			//$this->Error = ["<strong>Sucesso:</strong> O Curso {$this->CursoNome} foi cadastrada no sistema.", ALERT];
		else:
			echo "ERRO.";
		endif;
	}



}