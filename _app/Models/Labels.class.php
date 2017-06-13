<?php 

/*
 * Curso.class.php [MODEL]
 * Responsável por gerenciar os rótulos com Curso, Disciplina e Lista do sistema;
 *
 * @author João Henrique Feitosa
 */

 class Labels{

	private $Data;
	private $Tabela;
	private $CursoNome;
	private $Query;
	private $Error;
	private $Result; 

	// Nome da tabela no banco de dados;
	
	public function ExeCreate($Tabela, array $Data){
		$this->Tabela = $Tabela;
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
		$this->CursoNome = (string) $this->Data['label'];
	}

	private function getQuery(){
		if ($this->Tabela == 'curso'):
			$this->Query = ['c_nomecurs' => $this->CursoNome];
		elseif ($this->Tabela == 'disciplina'):
			$this->Query = ['c_nomedisc' => $this->CursoNome];
		elseif ($this->Tabela == 'lista'):
			$this->Query = ['c_nomelista' => $this->CursoNome];
		endif;
	}

	private function Create(){
		$Create = new Create;
		$Create -> ExeCreate($this->Tabela, $this->Query);
		if($Create->getResult()):
			$this->Result = $Create->getResult();
			//$this->Error = ["<strong>Sucesso:</strong> O Curso {$this->CursoNome} foi cadastrada no sistema.", ALERT];
		else:
			echo "ERRO.";
		endif;
	}

 }

 ?>