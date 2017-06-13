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

		<!--
		##########################################################################################
		######################################## MODALS ##########################################
		##########################################################################################
		-->

		<!-- ############################### MEUS DADOS :: NOME ###############################-->
		<div id="modalMeusDadosNome" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_nomeuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ############################### MEUS DADOS :: EMAIL ###############################-->
		<div id="modalMeusDadosEmail" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_mailuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ############################### MEUS DADOS :: CURSO ###############################-->
		<div id="modalMeusDadosCurso" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ############################### MEUS DADOS :: SENHA ###############################-->
		<div id="modalMeusDadosSenha" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# ADICIONA CURSO #################################-->
		<div id="modalAddCurso" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ###################### ADICIONAR OU REMOVER DISCIPLINA NO CURSO ##################-->
		<div id="modalAddCurso" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################ ADICIONA DISCIPLINA ##############################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# EDITAR DISCIPLINA ###############################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# ADICIONAR ASSUNTO ###############################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# EDITAR ASSUNTO #################################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# CRIAR NOVA LISTA ###############################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# EDITAR LISTA #################################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# CRIAR NOVO EXERCICIO ##########################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# EDITAR EXERCICIO ##############################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- #################################### VER EXERCICIO ##############################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# ADICIONA PROFESSOR ###############################-->
		<div id="modalAddProfessor" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# EDITAR PROFESSOR #################################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# EDITAR ALUNOS ###################################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

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
				<div class="gray">
					<h4>TADS</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
					<article class="detalhes">
						<div class="det dt02">
							<div><strong>22</strong><br>
							<small>Disciplinas</small></div>
						</div>
						<div class="det dt03">
							<div><strong>50</strong><br>
							<small>Alunos</small></div>
						</div>
						<div class="det dt04">
							<div><strong>8</strong><br>
							<small>Professores</small></div>
						</div><!-- FIM ARTICLE DETALHES -->
						<div id="menu_curso">
							<ul>
								<li><a href="#" title="">Adicionar/Remover Disciplina</a></li>
								<li><a href="#" title="">Excluir Curso</a></li>
							</ul>
						</div>
					</article>					
				</div>
				<div class="ngray">
					<h4>TADS</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
					<article class="detalhes">
						<div class="det dt02">
							<div><strong>22</strong><br>
							<small>Disciplinas</small></div>
						</div>
						<div class="det dt03">
							<div><strong>50</strong><br>
							<small>Alunos</small></div>
						</div>
						<div class="det dt04">
							<div><strong>8</strong><br>
							<small>Professores</small></div>
						</div><!-- FIM ARTICLE DETALHES -->
						<div id="menu_curso">
							<ul>
								<li><a href="#" title="">Adicionar/Remover Disciplina</a></li>
								<li><a href="#" title="">Excluir Curso</a></li>
							</ul>
						</div>
					</article>					
				</div>
				<div class="gray">
					<h4>TADS</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
					<article class="detalhes">
						<div class="det dt02">
							<div><strong>22</strong><br>
							<small>Disciplinas</small></div>
						</div>
						<div class="det dt03">
							<div><strong>50</strong><br>
							<small>Alunos</small></div>
						</div>
						<div class="det dt04">
							<div><strong>8</strong><br>
							<small>Professores</small></div>
						</div><!-- FIM ARTICLE DETALHES -->
						<div id="menu_curso">
							<ul>
								<li><a href="#" title="">Adicionar/Remover Disciplina</a></li>
								<li><a href="#" title="">Excluir Curso</a></li>
							</ul>
						</div>
					</article>					
				</div>
				<div class="ngray">
					<h4>TADS</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
					<article class="detalhes">
						<div class="det dt02">
							<div><strong>22</strong><br>
							<small>Disciplinas</small></div>
						</div>
						<div class="det dt03">
							<div><strong>50</strong><br>
							<small>Alunos</small></div>
						</div>
						<div class="det dt04">
							<div><strong>8</strong><br>
							<small>Professores</small></div>
						</div><!-- FIM ARTICLE DETALHES -->
						<div id="menu_curso">
							<ul>
								<li><a href="#" title="">Adicionar/Remover Disciplina</a></li>
								<li><a href="#" title="">Excluir Curso</a></li>
							</ul>
						</div>
					</article>					
				</div>


		</div><!-- FIM DIV CURSOS-->
		<div class="bloco" id="disciplinas">
			<h3>Disciplinas</h3>
			<div class="gray">
				<h4>Matemática</h4>
				<p>Professor Fulano</p>
				<p>Alunos: 66</p>
				<p>
				   <a href="#" title="">Editar</a>
				   <a href="#" title="">Excluir</a>
				</p>			
			</div>
			<div class="ngray">
				<h4>Matemática</h4>
				<p>Professor Fulano</p>
				<p>Alunos: 66</p>
				<p>
				   <a href="#" title="">Editar</a>
				   <a href="#" title="">Excluir</a>
				</p>			
			</div>
			<div class="gray">
				<h4>Matemática</h4>
				<p>Professor Fulano</p>
				<p>Alunos: 66</p>
				<p>
				   <a href="#" title="">Editar</a> 
				   <a href="#" title="">Excluir</a>
				</p>			
			</div>
			<div class="ngray">
				<h4>Matemática</h4>
				<p>Professor Fulano</p>
				<p>Alunos: 66</p>
				<p>
				   <a href="#" title="">Editar</a>
				   <a href="#" title="">Excluir</a>
				</p>			
			</div>
		</div><!-- FIM DIV DISCIPLINAS-->

		<div class="bloco gerenciaveis" id="professores">
			<h3>Professores</h3>
				<div>
					<p class="gray">
						<strong>João Henrique Feitosa</strong>  
						<em>Matemática </em>
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
					<p class="ngray">
						<strong>João Henrique Feitosa</strong>  
						<em>Matemática </em>
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
					<p class="gray">
						<strong>João Henrique Feitosa</strong>  
						<em>Matemática </em>
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
					<p class="ngray">
						<strong>João Henrique Feitosa</strong>  
						<em>Matemática </em>
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
				</div>				
			</div>
		</div><!-- FIM DIV PROFESSORES-->

		<div class="bloco gerenciaveis" id="alunos">
			<h3>Alunos</h3>
				<div>
					<p class="gray">
						<strong>João Henrique Feitosa</strong>  
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
					<p class="ngray">
						<strong>João Henrique Feitosa</strong>  
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
					<p class="gray">
						<strong>João Henrique Feitosa</strong>  
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
					<p class="ngray">
						<strong>João Henrique Feitosa</strong>  
						<a href="#" title="">Editar</a>
						<a href="#" title="">Excluir</a>
					</p>
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