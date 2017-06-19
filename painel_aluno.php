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

	if($_SESSION['userlogin']["n_niveuser"] != 1):
		unset($_SESSION['userlogin']);
		header('Location: index.php?exe=restrito');
	endif;

	if($exe == 'logoff'):
		unset($_SESSION['userlogin']);
		header('Location: index.php?exe=logoff');
	endif;

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Seja Bem Vindo ao Painel de Controle</title>
	<script type="text/javascript" src="js/menu.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/modal.css">
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
			<p>Seja bem vindo, Aluno <?php echo $_SESSION['userlogin']['c_nomeuser'];?></p>
			<p><small>Não é você? <?php echo "<a href=\"".$_SERVER['REQUEST_URI'].'?exe=logoff">'; ?>Clique aqui!</a></small></p>
		</div><!-- FIM DIV IDENTIFICAÇÃO-->

		<?php 
			require_once('modals.php');
		 ?>

		<div class="bloco gerenciaves" id="meus_dados">
			<h3>Meus Dados</h3>
			<table>
				<tr class="gray">
					<th><strong>Nome: </strong></th>
					<th><?php echo $_SESSION['userlogin']['c_nomeuser'];?></th>
					<th><a href="#modalMeusDadosNome" title="">Alterar</a></th>
				</tr>
				<tr>
					<th><strong>Email: </strong></th>
					<th><?php echo $_SESSION['userlogin']['c_mailuser'];?></th>
					<th><a href="#modalMeusDadosEmail" title="">Alterar</a></th>
				</tr>
				<tr class="gray">
					<th><strong>Curso: </strong></th>
					<th><?php echo $_SESSION['userlogin']['c_cursuser'];?></th>
					<th><a href="#modalMeusDadosCurso" title="">Alterar</a></th>
				</tr>
				<tr>
					<th><strong>Senha: </strong></th>
					<th>****</th>
					<th><a href="#modalMeusDadosSenha" title="">Alterar</a></th>
				</tr>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div><!-- FIM DIV MEUS_DADOS-->

		<div class="bloco gerenciaves" id="minhas_disciplinas">

			<h3>Disciplinas</h3>
				<?php 
				$idal = $_SESSION['userlogin']['n_numeuser'];
				//leciona.n_numeuser = user.n_numeuser AND leciona.n_numedisc = disciplina.n_numedisc AND disciplina.n_numedisc = 
				$readDisc = new read();
				$readDisc -> FullRead("SELECT * FROM disciplina, matriculado, disponibiliza WHERE  disciplina.n_numedisc = disponibiliza.n_numedisc AND disponibiliza.n_numecurs = matriculado.n_numecurs AND matriculado.n_numeuser = :id", "id=".$idal);

				echo $idal;


				
				$ArrDisc = $readDisc -> getResult();
				$NumElem = count($ArrDisc);
				
				for($x = 0; $x < $NumElem; $x ++){
					echo "<div class=\"gray\">";
					echo   "<h4>{$ArrDisc[$x]['c_nomedisc']}</h4>";
					echo   "<p>Professor: Fulano</p>
							<p>Listas: 66</p>
							<p>
							   <a href='#' title=''>Editar</a>
							   <a href='#' title=''>Excluir</a>
							</p>		
						  </div>";	}?>

		</div><!-- FIM DIV MINHAS DISCIPLINAS-->
		
		<div class="bloco gerenciaves" id="minhas_listas">
			<h3>Listas</h3>
			<?php 
				$idal = $_SESSION['userlogin']['n_numeuser'];
				//leciona.n_numeuser = user.n_numeuser AND leciona.n_numedisc = disciplina.n_numedisc AND disciplina.n_numedisc = 
				$readDisc = new read();
				$readDisc -> FullRead("SELECT * FROM 
										disciplina, matriculado, disponibiliza, contem, assunto, possui, lista
										WHERE lista.n_numelist = possui.n_numelist
										AND possui.n_numeassu = assunto.n_numeassu
										AND contem.n_numeassu = assunto.n_numeassu
										AND disciplina.n_numedisc = contem.n_numedisc
										AND disciplina.n_numedisc = disponibiliza.n_numedisc 
										AND disponibiliza.n_numecurs = matriculado.n_numecurs 
										AND matriculado.n_numeuser = :id;", "id=".$idal);

				echo $idal;



				
				$ArrDisc = $readDisc -> getResult();
				$NumElem = count($ArrDisc);


				
				
				for($x = 0; $x < $NumElem; $x ++){
					echo "<div class=\"gray\">";
					echo   "<h4><a href='exercicio.php?numlist=".$ArrDisc[$x]['n_numelist']."'title=''>{$ArrDisc[$x]['c_nomelist']}</a></h4>";
					echo   "<p>Algoritmos - Introdução às Variáveis</p>
							<p>Exercicios: 12</p>
							<p>
							   <a href='#' title=''>Editar</a>
							   <a href='#' title=''>Excluir</a>
							</p>		
						  </div>";	}?>
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
