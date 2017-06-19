<!--

		##########################################################################################
		######################################## MODALS ##########################################
		##########################################################################################
		-->

	
	<?php 

	require('_app/Models/Exercicio.class.php');
	require('_app/Models/Labels.class.php');

	 ?>

		<!-- ############################### MEUS DADOS :: NOME ###############################-->
		<div id="modalMeusDadosNome" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_nomeuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ############################### MEUS DADOS :: EMAIL ###############################-->
		<div id="modalMeusDadosEmail" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Email: <?php echo $_SESSION['userlogin']['c_mailuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo email aqui:</label>
				<input type="text" name="email"></p>
				<input type="submit" name="submitMeusDadosEmail">
			</form>
		</div>

		<!-- ############################### MEUS DADOS :: CURSO ###############################-->
		<div id="modalMeusDadosCurso" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Curso: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo curso aqui:</label>
				<input type="text" name="curso"></p>
				<input type="submit" name="submitMeusDadosCurso">
			</form>
		</div>

		<!-- ############################### MEUS DADOS :: SENHA ###############################-->
		<div id="modalMeusDadosSenha" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Senha: <strong>******</strong> </p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite a nova senha aqui:</label>
				<input type="text" name="senha"></p>
				<input type="submit" name="submitMeusDadosEmail">
			</form>
		</div>

		<!-- ################################# ADICIONA CURSO #################################-->
		<div id="modalAddCurso" class="modal">
			<?php 
				$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				if(!empty($post['submitAddCurso'])):
					unset($post['submitAddCurso']);

					
					$cadastra = new Labels;
					$cadastra -> ExeCreate('curso', $post);

					if(!$cadastra->getResult()):
						//GError($cadastra->getError()[0], $cadastra->getError()[1]);
					endif;
				endif;
			 ?>			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<form method="post" accept-charset="utf-8">
				<h3>ADICIONAR CURSO</h3>
				<p><label for="nome">Digite o nome  do novo curso aqui:</label>
				<input type="text" name="label"></p>
				<input type="submit" name="submitAddCurso">
			</form>
		</div>

		<!-- ###################### ADICIONAR OU REMOVER DISCIPLINA NO CURSO ##################-->
		<div id="modalAddCurso" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p>
					<label for="optcurso">Selecione o nome do curso aqui:</label>
					<select name="optcurso">
					<option value="null" selected>SEU CURSO</option>
					<option value="primeiro_tads">TADS</option>
					<option value="segundo_tads">TADS</option>
				</select>
				</p>
				<input type="submit" name="submitMeusDadosAddRemCurso">
			</form>
		</div>

		<!-- ################################ ADICIONA DISCIPLINA ##############################-->
		<div id="modalAddDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<?php 
				$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				
				if(!empty($post['submitAddDisciplina'])):
					unset($post['submitAddDisciplina']);

					
					$cadastra = new Labels;
					$cadastra -> ExeCreate('disciplina', $post);

					$curso = $post['curso'];
					unset($post['curso']);

					if(!$cadastra->getResult()):
						//GError($cadastra->getError()[0], $cadastra->getError()[1]);
					endif;

					

					$disponibiliza  = ['n_numedisc' => $cadastra->getLastId(), 'n_numecurs' => $curso];

					if($disponibiliza):
						$create = new Create;
						$create->ExeCreate('disponibiliza', $disponibiliza);
					endif;

				endif;
				$readCurs = new Read;
				$readCurs -> ExeRead('curso');
			 ?>		
			<form method="post" accept-charset="utf-8">
				<h3>ADICIONAR DISCIPLINA</h3>
				<p><label for="nome">Digite a nova disciplina aqui:</label>
					<input type="text" name="label"></p>
					<select name="curso" id="icurso">
					<option value="" selected></option>
					<?php
						foreach ($readCurs->getResult() as $value) {
							echo "<option value=\"{$value['n_numecurs']}\">{$value['c_nomecurs']}</option>";
						}
					?>
				</select>
				<input type="submit" name="submitAddDisciplina">
			</form>
		</div>

		<!-- ################################# EDITAR DISCIPLINA ###############################-->
		<div id="modalEditDisciplina" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<p>Nome: <?php echo $_SESSION['userlogin']['c_cursuser'];?></p>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite o novo nome aqui:</label>
				input<input type="text" name="nome"></p>
				<input type="submit" name="submitMeusDadosNome">
			</form>
		</div>

		<!-- ################################# ADICIONAR ASSUNTO ###############################-->
		<div id="modalAddAssunto" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>


			<?php 
				$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$disciplina = "";
				
				$cadastraDisc = new Labels;
				if(!empty($post['submitAddAssunto'])):
					unset($post['submitAddAssunto']);

					$disciplina = $post['disciplina'];
					unset($post['disciplina']);

					$cadastraDisc->ExeCreate('assunto', $post);
					if(!$cadastraDisc->getResult()):
						//GError($cadastra->getError()[0], $cadastra->getError()[1]);
					endif;
				endif;

				$read = new Read;
				$read -> ExeRead('disciplina');

				$contem  = ['n_numeassu' => $cadastraDisc->getLastId(), 'n_numedisc' => $disciplina];

				if($disciplina):
					$create = new Create;
					$create->ExeCreate('contem', $contem);
				endif;
			 ?>	
			 <h3>ADICIONAR ASSUNTO</h3>

			<form method="post" accept-charset="utf-8">
				<p><label for="label">Novo Assunto:</label>
				<input type="text" name="label"></p>
				<select name="disciplina" id="idisciplina">
					<option value="" selected></option>
					<?php
						foreach ($read->getResult() as $value) {
							echo "<option value=\"{$value['n_numedisc']}\">{$value['c_nomedisc']}</option>";
						}
					?>
				</select>
				<input type="submit" name="submitAddAssunto">
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
		<div id="modalAddNovaLista" class="modal">		
		<a href="#fechar" title="Fechar" class="fechar">X</a>	
			<?php 
				$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$assunto = "";

				$cadastraList = new Labels;
				if(!empty($post['submitAddNovaLista'])):
					unset($post['submitAddNovaLista']);

					$assunto = $post['assunto'];
					unset($post['assunto']);

					$cadastraList->ExeCreate('lista', $post);
					if(!$cadastraList->getResult()):
						//GError($cadastra->getError()[0], $cadastra->getError()[1]);
					endif;
				endif;

				$read = new Read;
				$read -> ExeRead('assunto');

				$possui  = ['n_numelist' => $cadastraList->getLastId(), 'n_numeassu' => $assunto];

				if($assunto):
					$create = new Create;
					$create->ExeCreate('possui', $possui);
				endif;

			?>	
			<h3>Criar Nova Lista</h3>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Digite a nova lista:</label>
				<input type="text" name="label"></p>
				<select name="assunto" id="iassunto">
					<option value="" selected></option>
					<?php
						foreach ($read->getResult() as $value) {
							echo "<option value=\"{$value['n_numeassu']}\">{$value['c_nomeassu']}</option>";
						}
					?>
				</select>				
				<input type="submit" name="submitAddNovaLista">
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
		<div id="modalCriaNovoExercicio" class="modal">			
			<a href="#fechar" title="Fechar" class="fechar">X</a>
			<?php 
				$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$lista = "";
				
				$Exercicio = new Exercicio;


				if(!empty($post['submitCriaNovoExercicio'])):
					unset($post['submitCriaNovoExercicio']);

					$lista = $post['lista'];
					unset($post['lista']);


					$authorID = $_SESSION['userlogin']['n_numeuser'];

					$Exercicio->ExeExercicio(58, $lista, $post);
					if(!$Exercicio->getResult()):
						//GError($cadastra->getError()[0], $cadastra->getError()[1]);
					endif;
				endif;

				$read = new Read;
				$read -> ExeRead('lista');

				//$possui  = ['n_numeexer' => $cadastraList->getLastId(), 'n_numelist' => $lista];

				if($lista):
					$create = new Create;
					//$create->ExeCreate('armazena', $possui);
				endif;

			?>
			<h3>Criar Novo Exercicio</h3>
			<form method="post" accept-charset="utf-8">
				<p><label for="enunciado">Digite o enunciado aqui:</label>
				<input type="text" name="enunciado"></p>
				<p><label for="opA">Alternativa A:</label>
				<input type="text" name="opA"></p>
				<p><label for="opB">Alternativa B:</label>
				<input type="text" name="opB"></p>
				<p><label for="opC">Alternativa C:</label>
				<input type="text" name="opC"></p>
				<p><label for="opD">Alternativa D:</label>
				<input type="text" name="opD"></p>
				<p><label for="opE">Alternativa E:</label>
				<input type="text" name="opE"></p>
				<p><label for="correta">Alternativa Correta:</label>
				<input type="text" name="correta"></p>
				<select name="lista" id="ilista">
					<option value="" selected></option>
					<?php
						foreach ($read->getResult() as $value) {
							echo "<option value=\"{$value['n_numelist']}\">{$value['c_nomelist']}</option>";
						}
					?>
				</select>				

				<input type="submit" name="submitCriaNovoExercicio">
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
			<?php 
				$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
				$cadastro = new Cadastro(2);
				$disciplina = "";
				if(!empty($post['submitAddPRofessor'])):
					unset($post['submitAddPRofessor']);
					
					$disciplina = $post['disciplina'];
					unset($post['disciplina']);
			
					
					
					if(!empty($post)):
						$cadastro->ExeCadastro($post);
					else:
						echo "vazio";
					endif;

					if(!$cadastro->getResult()):
						//GErro($cadastro->getError()[0], $cadastro->getError()[1]);
					else:
						echo "PROFESSOR ADICIONADO COM SUCESSO!";
					endif;				
				endif;

				$read = new Read;
				$read -> ExeRead('disciplina');

				$leciona  = ['n_numeuser' => $cadastro->getLastId(), 'n_numedisc' => $disciplina];

				if($disciplina):
					$create = new Create;
					$create->ExeCreate('leciona', $leciona);
				endif;
				
				
			?>		




			<h3>ADICIONAR PROFESSOR</h3>
			<form method="post" accept-charset="utf-8">
				<p><label for="nome">Nome: </label>
				<input type="text" name="user"></p>
				<p><label for="nome">Email: </label>
				<input type="text" name="email"></p>
				<label for="icurso">Selecione a materia: </label>
				<select name="disciplina" id="idisciplina">
					<option value="" selected></option>
					<?php
						foreach ($read->getResult() as $value) {
							echo "<option value=\"{$value['n_numedisc']}\">{$value['c_nomedisc']}</option>";
						}
					?>
				</select>
				<p><label for="nome">Senha: </label>
				<input type="text" name="pass"></p>
				<input type="submit" name="submitAddPRofessor">
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