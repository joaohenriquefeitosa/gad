<?php 

	// CONFIGURAÇÕES DO SITE #####################################
	define('HOST','localhost');
	define('USER','john');
	define('PASS','');
	define('DBSA','gad');

	// CONFIGURAÇÕES DO SITE #####################################
	function __autoload($Class){

		// DIRETORIOS DA PASTA _app
		$cDir = ['Conn', 'Helpers', 'Models'];
		$iDir = null;

		foreach($cDir as $dirName):
			if(!$iDir && file_exists(__DIR__."//{$dirName}//{$Class}.class.php") && !is_dir(__DIR__."\\{$dirName}\\{$Class}.class.php")):
				include_once(__DIR__."//{$dirName}//{$Class}.class.php");
				$iDir = true;
			endif;
		endforeach;

		if(!$iDir):
			trigger_error("Não foi possível inclur{$Class}.class.php", E_USER_ERROR);
			die;
		endif;
	}

	// TRATAMENTO DE ERROS #####################################

	// CSS CONSTANTES :: MENSAGENS DE ERRO #####################
	define('GD_ACCEPT', 'accpet');
	define('GD_INFOR', 'infor');
	define('GD_ALERT', 'alert');
	define('GD_ERROR', 'error');

	// GERROR :: EXIBE ERROS LANÇADOS :: FRONT
	function GError($ErrorMsg, $ErrorNo, $ErrorDie = null){
		$CssClass = ($ErrNo == E_USER_NOTICE ? GD_INFOR : ($ErrNo == E_USER_WARNING ? GD_ALERT : ($ErrNo == E_USER_ERROR ? GD_ERROR : $ErrNo)));
		echo "<p class=\"trigger.{$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></p>";

		if($ErrDie):
			die;
		endif;
	}

	// PHPErro :: personaliza o gatilho do PHP
	function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine){
		$CssClass = ($ErrNo == E_USER_NOTICE ? GD_INFOR : ($ErrNo == E_USER_WARNING ? GD_ALERT : ($ErrNo == E_USER_ERROR ? GD_ERROR : $ErrNo)));
		echo "<p class=\"trigger.{$CssClass}\">";
		echo "<strong>Erro na Linha: #{$ErrLine} :: </strong> {$ErrMsg}<br/>";
		echo "<small>{$ErrFile}</small>";
		echo "<span class=\"ajax_close\"></span></p>";

		if($ErrNo == E_USER_ERROR):
			die;
		endif;
	}

	set_error_handler('PHPErro');


	// TABELAS DO SISTEMA
	define('TABELA', 'user');

 ?>