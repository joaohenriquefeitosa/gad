<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>G.A.D. - Cadastro</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header id="inicio">
		<p><img src="img/students.png" alt=""></p>
		<h1>G.A.D. Gerenciador de Atividades Dinâmico</h1>
	</header><!-- /header -->

	<section>
		<form id="logcad">
			<div id="nome">
			<label for="iuser"><span><img src="img/user.png" alt=""></span></label>
			<input type="text" name="nuser" id="iuser" value="seu nome...">
			</div>

			<div id="email">
			<label for="iuser"><span><img src="img/email.png" alt=""></span></label>
			<input type="text" name="nuser" id="iuser" value="email...">
			</div>

			<div id="curso">
			<label for="icurso"><span><img src="img/course.png" alt=""></span></label>
			<select name="ncurso" id="icurso">
				<option value="" selected>SEU CURSO</option>
				<option value="">TADS</option>
				<option value="">TADS</option>
			</select>
			</div>


			<div id="pass">
			<label for="ipass"><span><img src="img/padlock.png" alt="" width="20px" height="20px"></span></label>
			<input type="password" name="npass" id="ipass" value="senha...">
			</div>

			<div id="enviar"><p>Cadastre-se</p> <img src="img/login.png" alt=""><div id="clear"></div></div>
			<div id="troca">Não é cadastrado? <a href="cadastro.php"><small>Clique aqui!</small></a></div>
		</form>
	</section>
	
</body>
</html>