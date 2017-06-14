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

					require('_app/Models/Labels.class.php');
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

					require('_app/Models/Labels.class.php');
					$cadastra = new Labels;
					$cadastra -> ExeCreate('disciplina', $post);

					if(!$cadastra->getResult()):
						//GError($cadastra->getError()[0], $cadastra->getError()[1]);
					endif;
				endif;
			 ?>		
			<form method="post" accept-charset="utf-8">
				<h3>ADICIONAR DISCIPLINA</h3>
				<p><label for="nome">Digite a nova disciplina aqui:</label>
					<input type="text" name="label"></p>
				<input type="submit" name="submitAddDisciplina">
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