<?php 

/*
 * Cadastro.class [ MODEL ]
 * Responsável por cadastrar novo usuários do sistema;
 *
 * @author João Henrique Feitosa
 */


class Cadastro{

	private $Level;
	private $Email;
	private $Senha;
	private $Error;
	private $Result;

	function __construct(){

	}

	public function ExeLogin(){

	}

	public function getResult(){
		return $this->Result;
	}

	/**
	 * ****************************************
	 * ************ PRIVATE METHODS ***********
	 * ****************************************
	 */
	
	public function setLogin(){

	}

	public function getUser(){

	}

	private function Execute(){
		if(!session_id()):
			session_start();
		endif;


	}
}

 ?>