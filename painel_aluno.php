<?php 
	session_start();
	require('./_app/Config.inc.php');

	$login = new Login();
	$exe = filter_input(INPUT_GET, 'exe');
	echo $exe;


	if(!$login->CheckLogin()):
		unset($_SESSION['userlogin']);
		header('Location: index.php?exe=restrito');
	else:
		$userlogin = $_SESSION['userlogin'];
	endif;

	if($_SESSION['userlogin']["n_niveuser"] != 3):
		unset($_SESSION['userlogin']);
		header('Location: index.php?');
	endif;

	if($exe == 'logoff'):
		unset($_SESSION['userlogin']);
		header('Location: index.php?');
	endif;

	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Seja Bem Vindo ao Painel de Controle</title>
	<script type="text/javascript" src="js/menu.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="interface">
	<h1>G.A.D - Gerenciador de Atividades Dinâmico</h1>
	<article class="detalhes">
		<div class="det dt01">
			<div><strong>6</strong><br>
			<small>Minhas Disciplinas</small></div>
		</div>
		<div class="det dt02">
			<div><strong>22</strong><br>
			<small>Exercícios Feitos</small></div>
		</div>
		<div class="det dt03">
			<div><strong>50</strong><br>
			<small>Exercícios Pendentes</small></div>
		</div>
		<div class="det dt04">
			<div><strong>87%</strong><br>
			<small>Média de Acerto</small></div>
		</div>
	</article>
	<article id="corpo">
		<div id="identificacao">
			<p>Seja bem vindo, Adm. João Henrique.</p>
			<p><small>Não é você? <a href="#" title="">Clique aqui!</a></small></p>
		</div><!-- FIM DIV IDENTIFICAÇÃO-->

		<div class="bloco gerenciaves" id="meus_dados">
			<h3>Meus Dados</h3>
			<table>
				<tr class="gray">
					<th><strong>Nome: </strong></th>
					<th>João Henrique Feitosa</th>
					<th><a href="#" title="">Alterar</a></th>
				</tr>
				<tr>
					<th><strong>Email: </strong></th>
					<th>joaohenriquefsf@gmail.com</th>
					<th><a href="#" title="">Alterar</a></th>
				</tr>
				<tr class="gray">
					<th><strong>Curso: </strong></th>
					<th>TADS</th>
					<th><a href="#" title="">Alterar</a></th>
				</tr>
				<tr>
					<th><strong>Senha: </strong></th>
					<th>****</th>
					<th><a href="#" title="">Alterar</a></th>
				</tr>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div><!-- FIM DIV MEUS_DADOS-->

		<div class="bloco gerenciaves" id="minhas_disciplinas">
			<p>MINHAS DISCIPLINAS</p>
		</div><!-- FIM DIV MINHAS DISCIPLINAS-->
		
		<div class="bloco gerenciaves" id="minhas_listas">
			<p>MINHAS LISTAS</p>
		</div><!-- FIM DIV MINHAS LISTAS-->

	</article><!-- FIM ARTICLE CORPO-->
</section>
<aside class="interface">
	<header>
		<img src="img/students.png" alt="">	
	</header><!-- /header -->
	<div id="menu">
		<ul>
			<li class="option" id="click_meus_dados">Meus Dados</li>
			<li class="option" id="click_minhas_disciplinas">Minhas Disciplinas</li>
			<li class="option" id="click_minhas_listas">Minhas Listas</li>
			<li class="option">Sair</li>
		</ul>		
	</div>
</aside>	
<div id="clear"></div>
	
</body>
</html>
