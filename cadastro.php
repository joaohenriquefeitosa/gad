<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>G.A.D. - Cadastro</title>
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

		$cadastro = new Cadastro();

		$dataCadastro = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if(!empty($dataCadastro['submitCadastro'])):
				$cadastro->ExeCadastro($dataCadastro);
			if(!$cadastro->getResult()):
				GErro($cadastro->getError()[0], $cadastro->getError()[1]);
			else:
				header('Location: painel_aluno.php');
			endif;				
		endif;
		/*

		

			if(!$cadastro->getResult()):
				GErro($cadastro->getError()[0], $cadastro->getError()[1]);
			else:
				header('Location: painel_admin.php');
			endif;

		
		*/


		echo "<pre>";
		print_r($cadastro);
		print_r($dataCadastro);
		echo "</pre>";
	 ?>



	<section>
		<form id="logcad" method="post">
			<div id="nome">
			<label for="iuser"><span><img src="img/user.png" alt=""></span></label>
			<input type="text" name="user" id="iuser" value="seu nome...">
			</div>

			<div id="email">
			<label for="iemail"><span><img src="img/email.png" alt=""></span></label>
			<input type="text" name="email" id="iemail" value="email...">
			</div>

			<div id="curso">
			<label for="icurso"><span><img src="img/course.png" alt=""></span></label>
			<select name="curso" id="icurso">
				<option value="" selected>SEU CURSO</option>
				<option value="primeiro_tads">TADS</option>
				<option value="segundo_tads">TADS</option>
			</select>
			</div>


			<div id="pass">
			<label for="ipass"><span><img src="img/padlock.png" alt="" width="20px" height="20px"></span></label>
			<input type="text" name="pass" id="ipass" value="senha...">
			</div>
			<input type="submit" name="submitCadastro" value="Enviar">
			<div id="enviar"><p>Cadastre-se</p> <img src="img/login.png" alt=""><div id="clear"></div></div>
			<div id="troca">Não é cadastrado? <a href="cadastro.php"><small>Clique aqui!</small></a></div>
		</form>
	</section>
	
</body>
</html>