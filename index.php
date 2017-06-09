<?php 
	session_start();
 ?>
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

		$login = new Login(2);

		$dataLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		if(!empty($dataLogin['submitLogin'])):
			$login->ExeLogin($dataLogin);

			if(!$login->getResult()):
				GErro($login->getError()[0], $login->getError()[1]);
			else:
				header('Location: painel_admin.php');
			endif;

		endif;

	 ?>

	<section>
		<form id="logcad" method="post">
			<div id="user">
			<label for="iuser"><span><img src="img/user.png" alt=""></span></label>
			<input type="text" name="user" id="iuser" value="email ou grr...">
			</div>

			<div id="pass">
			<label for="ipass"><span><img src="img/padlock.png" alt=""></span></label>
			<input type="text" name="pass" id="ipass" value="senha...">
			</div>

			<input type="submit" name="submitLogin">

			<div id="enviar"><p>Login</p> <img src="img/login.png" alt=""><div id="clear"></div></div>
			<div id="troca">Não é cadastrado? <a href="cadastro.php"><small>Clique aqui!</small></a></div>
		</form>
	</section>
	
</body>
</html>