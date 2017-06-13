<?php 

/*
 * Curso.class.php [MODEL]
 * Responsável por gerenciar os cursos do sistema;
 *
 * @author João Henrique Feitosa
 */

 class Curso{

	private $Data;
	private $CursoNome;
	private $Query;
	private $Error;
	private $Result; 

	// Nome da tabela no banco de dados;
	const Entity = 'curso';

	public function ExeCreate(array $Data){
		$this->Data = $Data;

		if(in_array('', $this->Data)):
			$this->Result = false;
			$this->Error = ['<strong>Erro ao Adicionar: Para adicionar um novo curso, preencha todos os campos</strong>', ALERT];
		else:
			$this->setNome();
			$this->getQuery();
			$this->Create();
		endif;
	}

	public function getResult(){
		return $this->Result;
	}

	public function getError(){
		return $this->Error;
	}


	// ######################################################################
	// ############################## PRIVATE ###############################
	// ######################################################################

	private function setNome(){
		$this->Data = array_map('strip_tags', $this->Data);
		$this->Data = array_map('trim', $this->Data);
		$this->CursoNome = (string) $this->Data['modcurso'];
	}

	private function getQuery(){
		$this->Query = ['c_nomecurs' => $this->CursoNome];
	}

	private function Create(){
		$Create = new Create;
		$Create -> ExeCreate(self::Entity, $this->Query);
		if($Create->getResult()):
			$this->Result = $Create->getResult();
			//$this->Error = ["<strong>Sucesso:</strong> O Curso {$this->CursoNome} foi cadastrada no sistema.", ALERT];
		else:
			echo "ERRO.";
		endif;
	}

 }

 ?>