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
			<small>Total de Cursos</small></div>
		</div>
		<div class="det dt02">
			<div><strong>22</strong><br>
			<small>Total de Disciplinas</small></div>
		</div>
		<div class="det dt03">
			<div><strong>50</strong><br>
			<small>Total de Alunos</small></div>
		</div>
		<div class="det dt04">
			<div><strong>8</strong><br>
			<small>Total de Professores</small></div>
		</div><!-- FIM ARTICLE DETALHES -->
	</article>
	<article id="corpo">
		<div id="identificacao">
			<p>Seja bem vindo, Adm. <?php echo $_SESSION['userlogin']['c_nomeuser'];?></p>
			<p><small>Não é você? <?php echo "<a href=\"".$_SERVER['REQUEST_URI'].'?exe=logoff">'; ?>Clique aqui!</a></small></p>
		</div><!-- FIM DIV IDENTIFICAÇÃO-->

		<?php 
			require_once('modals.php');
		 ?>

		<div class="bloco" id="meus_dados">
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
		</div><!-- FIM DIV MEUS_DADOS-->		
		<div class="bloco" id="cursos">
			<h3>Cursos</h3>
				<?php 
				$readCourse = new read();
				$readCourse -> FullRead("SELECT COUNT(*) FROM curso");
				$NumElem = $readCourse -> getResult()[0]["COUNT(*)"];
				$readCourse -> ExeRead('curso');
				$ArrCursos = $readCourse -> getResult();
				
				for($x = 0; $x < $NumElem; $x ++){
					$count = 2;
					echo "<div class=\"gray\">";
					
						echo "<h4>{$ArrCursos[$x]['c_nomecurs']}</h4>";

						echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>";

						echo "<article class='detalhes'>
								<div class='det dt02'>
									<div><strong>22</strong><br>
									<small>Disciplinas</small></div>
								</div>
								<div class='det dt03'>
									<div><strong>50</strong><br>
									<small>Alunos</small></div>
								</div>
								<div class='det dt04'>
									<div><strong>8</strong><br>
									<small>Professores</small></div>
								</div><!-- FIM ARTICLE DETALHES -->
								<div id='menu_curso'>
									<ul>
										<li><a href='#'' title=''>Adicionar/Remover Disciplina</a></li>
										<li><a href='#'' title=''>Excluir Curso</a></li>
									</ul>
								</div>
							  </article>
						</div>";}?>
							    
			</div><!-- FIM DIV CURSOS-->					
				
		<div class="bloco" id="disciplinas">
			<h3>Disciplinas</h3>
				<?php 
				$readDisc = new read();
				$readDisc -> FullRead("SELECT COUNT(*) FROM disciplina");
				$NumElem = $readDisc -> getResult()[0]["COUNT(*)"];
				$readDisc -> ExeRead('disciplina');
				$ArrDisc = $readDisc -> getResult();
				
				for($x = 0; $x < $NumElem; $x ++){
					echo "<div class=\"gray\">";
					echo   "<h4>{$ArrDisc[$x]['c_nomedisc']}</h4>";
					echo   "<p>Professor Fulano</p>
							<p>Alunos: 66</p>
							<p>
							   <a href='#' title=''>Editar</a>
							   <a href='#' title=''>Excluir</a>
							</p>		
						  </div>";	}?>
		</div><!-- FIM DIV DISCIPLINAS-->
				


		<div class="bloco gerenciaveis" id="professores">
			<h3>Professores</h3>
				<div>
					<?php 
					$readProf = new read();
					$readProf -> FullRead("SELECT COUNT(*) FROM user WHERE n_niveuser = 2");
					$NumElem = $readProf -> getResult()[0]["COUNT(*)"];
					$readProf -> ExeRead('user', 'WHERE n_niveuser = 2');
					$ArrProf = $readProf -> getResult();
					
					for($x = 0; $x < $NumElem; $x ++){

						echo "<p class=\"gray\">";
								echo "<strong>{$ArrProf[$x]['c_nomeuser']}</strong>";
								echo "<em>Matemática </em>";
								echo "<a href='#' title=''>Editar</a>
								<a href='#' title=''>Excluir</a>
							 </p>";

					}?>
				</div>				
			</div>
		</div><!-- FIM DIV PROFESSORES-->

		<div class="bloco gerenciaveis" id="alunos">
			<h3>Alunos</h3>
				<div>
					<?php 
					$readAlun = new read();
					$readAlun -> FullRead("SELECT COUNT(*) FROM user WHERE n_niveuser = 1");
					$NumElem = $readAlun -> getResult()[0]["COUNT(*)"];
					$readAlun -> ExeRead('user', 'WHERE n_niveuser = 1');
					$ArrAlun = $readAlun -> getResult();
					
					for($x = 0; $x < $NumElem; $x ++){

						echo "<p class=\"gray\">";
								echo "<strong>{$ArrAlun[$x]['c_nomeuser']}</strong> ";
								echo "<a href='#' title=''>Editar</a>
								<a href='#' title=''>Excluir</a>
							 </p>";

					}?>
				</div>				
			</div>
		</div><!-- FIM DIV PROFESSORES-->
	</article>
</section>
<aside class="interface">
	<header>
		<img src="img/students.png" alt="">	
	</header><!-- Fim header -->
	<div id="menu">
		<ul>
			<li class="option" id="click_meus_dados">Meus Dados</li>
			<li class="option" id="click_cursos">Gerenciar Cursos
				<ul>
					<li id="click_sub_cursos"><a href="#modalAddCurso" title="">Adicionar Curso</a></li>
				</ul>
			</li>
			<li class="option" id="click_disciplinas">Gerenciar Disciplinas
				<ul>
					<li id="click_sub_disciplinas"><a href="#modalAddDisciplina" title="">Adicionar Disciplina</a></li>
				</ul>
			</li>
			<li class="option" id="click_professores">Gerenciar Professores
				<ul>
					<li id="click_sub_professores" class="submenu"><a href="#modalAddProfessor" title="">Adicionar Professor</a></li>
				</ul>
			</li>
			<li class="option" id="click_alunos">Gerenciar Alunos</li>
			<li class="option">Sair</li>
		</ul>		
	</div>
</aside>	
<div id="clear"></div>

</body>
</html>