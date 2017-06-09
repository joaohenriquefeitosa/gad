<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>G.A.D. - Login</title>
	<script type="text/javascript" src="js/forms.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header id="inicio">
		<p><img src="img/students.png" alt=""></p>
		<h1>G.A.D. Gerenciador de Atividades Dinâmico</h1>
	</header><!-- /header -->

	<?php 

	require('./_app/Config.inc.php');

	$Dados = ['b_admiprof' => 24];

	$Update = new Update;
	$Update -> ExeUpdate('professor', $Dados, 'WHERE n_numeprof = :id', 'id=1');

	if($Update->getResult()):
		echo "{$Update->getRowCount()} dado(s) atualizados com sucesso!<hr>";
	endif;

	echo "<pre>";
	print_r($Update);
	echo "</pre>";

	?>

	<section>
		<form id="logcad">
			<div id="user">
			<label for="iuser"><span><img src="img/user.png" alt=""></span></label>
			<input type="text" name="nuser" id="iuser" value="email ou grr...">
			</div>

			<div id="pass">
			<label for="ipass"><span><img src="img/padlock.png" alt=""></span></label>
			<input type="text" name="npass" id="ipass" value="senha...">
			</div>

			<div id="enviar"><p>Login</p> <img src="img/login.png" alt=""><div id="clear"></div></div>
			<div id="troca">Não é cadastrado? <a href="cadastro.php"><small>Clique aqui!</small></a></div>
		</form>
	</section>
	
</body>
</html>