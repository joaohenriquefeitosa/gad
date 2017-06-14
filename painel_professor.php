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

	if($_SESSION['userlogin']["n_niveuser"] != 2):
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
			<div><strong>3</strong><br>
			<small>Meus Cursos</small></div>
		</div>
		<div class="det dt02">
			<div><strong>22</strong><br>
			<small>Minhas Disciplinas</small></div>
		</div>
		<div class="det dt03">
			<div><strong>50</strong><br>
			<small>Meus Alunos</small></div>
		</div>
		<div class="det dt04">
			<div><strong>8</strong><br>
			<small>Meus Exercícios</small></div>
		</div>
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

		<div class="bloco gerenciaves" id="assuntos">
			<h3>Assuntos</h3>
			<?php 
				$readCourse = new read();
				$readCourse -> FullRead("SELECT COUNT(*) FROM contem");
				$NumElem = $readCourse -> getResult()[0]["COUNT(*)"];
				$readCourse -> FullRead("SELECT c_nomedisc, c_nomeassu FROM contem, disciplina, assunto WHERE contem.n_numedisc = disciplina.n_numedisc AND contem.n_numeassu = assunto.n_numeassu order by(c_nomedisc)");
				$ArrAssunto = $readCourse -> getResult();
				
				for($x = 0; $x < $NumElem; $x ++){
					echo "<p class=\"gray\">";
					echo      "<strong>{$ArrAssunto[$x]['c_nomedisc']}</strong>
							  <em>{$ArrAssunto[$x]['c_nomeassu']} </em><a href='#' title=''>Editar</a>
							<a href='#' title=''>Excluir</a>
						  </p>";
				}
				 ?>
		</div><!-- FIM ASSUNTOS -->

		<div class="bloco gerenciaves" id="listas">
		<h3>Listas</h3>
			<?php 
				$readList = new read();
				$readList -> FullRead("SELECT COUNT(*) FROM contem, possui, lista, disciplina, assunto WHERE contem.n_numedisc = disciplina.n_numedisc AND contem.n_numeassu = assunto.n_numeassu AND contem.n_numeassu = possui.n_numeassu AND possui.n_numelist = lista.n_numelist");
				$NumElem = $readList -> getResult()[0]["COUNT(*)"];
				$readList -> FullRead("SELECT c_nomelist, c_nomedisc, c_nomeassu FROM contem, possui, lista, disciplina, assunto WHERE contem.n_numedisc = disciplina.n_numedisc AND contem.n_numeassu = assunto.n_numeassu AND contem.n_numeassu = possui.n_numeassu AND possui.n_numelist = lista.n_numelist order by(c_nomedisc)	");
				$ArrList = $readList -> getResult();
				
				for($x = 0; $x < $NumElem; $x ++){
					echo "<p class=\"gray\">";
					echo      "<strong>{$ArrList[$x]['c_nomelist']}</strong>
							  <em>{$ArrList[$x]['c_nomeassu']} - {$ArrList[$x]['c_nomedisc']}</em><a href='#' title=''>Editar</a>
							<a href='#' title=''>Excluir</a>
						  </p>";
				}
			?>
		</div><!-- FIM LISTAS -->

		<div class="bloco gerenciaves" id="exercicios">
			<h3>Meus Exercícios</h3>
			<div id="meus_exercicios">
			<div class="gray quest left">
				<h4>Exercicios 01 - Lista 03</h4>
				<small>Conjuntos Numéricos - Matemática </small>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
				<p>a) 22</p>
				<p>b) 22</p>
				<p>c) 22</p>
				<p>d) 22</p>
				<p>e) 22</p>
				<p>
				   <a href="#" title="">Editar</a>
				   <a href="#" title="">Incluir</a>
				   <a href="#" title="">Excluir</a>
				</p>			
			</div>
			<div class="ngray quest right">
				<h4>Exercicios 01 - Lista 03</h4>
				<small>Conjuntos Numéricos - Matemática </small>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
				<p>a) 22</p>
				<p>b) 22</p>
				<p>c) 22</p>
				<p>d) 22</p>
				<p>e) 22</p>
				<p>
				   <a href="#" title="">Editar</a>
				   <a href="#" title="">Incluir</a>
				   <a href="#" title="">Excluir</a>
				</p>		
			</div>
			<div id="clear"></div>
			<div class="ngray quest left">
				<h4>Exercicios 01 - Lista 03</h4>
				<small>Conjuntos Numéricos - Matemática </small>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
				<p>a) 22</p>
				<p>b) 22</p>
				<p>c) 22</p>
				<p>d) 22</p>
				<p>e) 22</p>
				<p>
				   <a href="#" title="">Editar</a>
				   <a href="#" title="">Incluir</a>
				   <a href="#" title="">Excluir</a>
				</p>			
			</div>
			<div class="gray quest right">
				<h4>Exercicios 01 - Lista 03</h4>
				<small>Conjuntos Numéricos - Matemática </small>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut condimentum ligula. Nulla ac elementum lorem, quis iaculis massa. Aenean sit amet sapien ac lectus scelerisque aliquet malesuada a neque.</p>
				<p>a) 22</p>
				<p>b) 22</p>
				<p>c) 22</p>
				<p>d) 22</p>
				<p>e) 22</p>
				<p>
				   <a href="#" title="">Editar</a>
				   <a href="#" title="">Incluir</a>
				   <a href="#" title="">Excluir</a>
				</p>		
			</div>
			<div id="clear"></div>
			</div>
			<h3>Exercícios Existentes</h3>
				<div>
					<p class="gray">
						<strong>Exercicio 01 - Desenhe um ...</strong>  
						<em>Conjuntos Numéricos - Matemática </em>
						<small>Prof. John J Rambo</small>
						<a href="#" title="">Ver</a>
						<a href="#" title="">Incluir</a>
					</p>
					<p class="ngray">
						<strong>Exercicio 02 - Desenhe um ...</strong>   
						<em>Conjuntos Numéricos - Matemática </em>
						<small>Prof. John J Rambo</small>
						<a href="#" title="">Ver</a>
						<a href="#" title="">Incluir</a>
					</p>
					<p class="gray">
						<strong>Exercicio 03 - Desenhe um ...</strong>  
						<em>Conjuntos Numéricos - Matemática </em>
						<small>Prof. John J Rambo</small>
						<a href="#" title="">Ver</a>
						<a href="#" title="">Incluir</a>
					</p>
					<p class="ngray">
						<strong>Exercicio 04 - Desenhe um ...</strong>  
						<em>Conjuntos Numéricos - Matemática </em>
						<small>Prof. John J Rambo</small>
						<a href="#" title="">Ver</a>
						<a href="#" title="">Incluir</a>	
					</p>
				</div>	
		</div><!-- FIM EXERCICIOS -->

		<div class="bloco gerenciaves" id="alunos">
			<p>a desenvolver...</p>
		</div>

	</article><!-- FIM ARTICLE CORPO-->
</section>
<aside class="interface">
	<header>
		<img src="img/students.png" alt="">	
	</header><!-- /header -->
	<div id="menu">
		<ul>
			<li class="option" id="click_meus_dados">Meus Dados</li>
			<li class="option" id="click_assuntos">Gerenciar Disciplinas
				<ul>
					<li id="click_sub_assuntos"><a href="#modalAddAssunto" title="">Adicionar Novo Assunto</a></li>
				</ul>
			</li>
			<li class="option" id="click_listas">Gerenciar Listas
				<ul>
					<li id="click_sub_listas"><a href="#modalAddNovaLista" title="">Criar Nova Lista</a></li>
				</ul>
			</li>
			<li class="option" id="click_exercicios">Gerenciar Exercícios<ul>
					<li  id="click_sub_exercícios"><a href="#modalCriaNovoExercicio" title="">Criar Novo Exercício</a></li>
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
