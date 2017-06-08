// ADM
function meusDadosAdm(){
	document.getElementById("meus_dados").style.display = 'block';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}

function cursosAdm(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'block';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_cursos").style.display = 'block';
	document.getElementById("click_sub_professores").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}

function disciplinasAdm(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'block';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'block';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'none';
}

function professoresAdm(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'block';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'block';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}

function alunosAdm(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'block';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}

// PROFESSOR

function meusDadosProf(){
	document.getElementById("meus_dados").style.display = 'block';
	document.getElementById("assuntos").style.display = 'none';
	document.getElementById("listas").style.display = 'none';
	document.getElementById("exercicios").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_assuntos").style.display = 'none';
	document.getElementById("click_sub_listas").style.display = 'none';
	document.getElementById("click_sub_exercícios").style.display = 'none';
}

function assuntosProf(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("assuntos").style.display = 'block';
	document.getElementById("listas").style.display = 'none';
	document.getElementById("exercicios").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_assuntos").style.display = 'block';
	document.getElementById("click_sub_listas").style.display = 'none';
	document.getElementById("click_sub_exercícios").style.display = 'none';
}

function listasProf(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("assuntos").style.display = 'none';
	document.getElementById("listas").style.display = 'block';
	document.getElementById("exercicios").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_assuntos").style.display = 'none';
	document.getElementById("click_sub_listas").style.display = 'block';
	document.getElementById("click_sub_exercícios").style.display = 'none';
}

function exerciciosProf(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("assuntos").style.display = 'none';
	document.getElementById("listas").style.display = 'none';
	document.getElementById("exercicios").style.display = 'block';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_assuntos").style.display = 'none';
	document.getElementById("click_sub_listas").style.display = 'none';
	document.getElementById("click_sub_exercícios").style.display = 'block';
}

function alunosProf(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("assuntos").style.display = 'none';
	document.getElementById("listas").style.display = 'none';
	document.getElementById("exercicios").style.display = 'none';
	document.getElementById("alunos").style.display = 'block';
	document.getElementById("click_sub_assuntos").style.display = 'none';
	document.getElementById("click_sub_listas").style.display = 'none';
	document.getElementById("click_sub_exercícios").style.display = 'none';
}

// ALUNO

function meusDadosAluno(){
	document.getElementById("meus_dados").style.display = 'block';
	document.getElementById("minhas_disciplinas").style.display = 'none';
	document.getElementById("minhas_listas").style.display = 'none';
}

function minhasDisciplinas(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("minhas_disciplinas").style.display = 'block';
	document.getElementById("minhas_listas").style.display = 'none';
}

function minhasListas(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("minhas_disciplinas").style.display = 'none';
	document.getElementById("minhas_listas").style.display = 'block';
}


window.onload = function(){
	if(document.getElementById("click_cursos")){
		document.getElementById("click_meus_dados").onclick = function(evt) {meusDadosAdm();};
		document.getElementById("click_cursos").onclick = function(evt) {cursosAdm();};
		document.getElementById("click_disciplinas").onclick = function(evt) {disciplinasAdm();};
		document.getElementById("click_professores").onclick = function(evt) {professoresAdm();};
		document.getElementById("click_alunos").onclick = function(evt) {alunosAdm();};
	}
	if(document.getElementById("click_assuntos")){
		document.getElementById("click_meus_dados").onclick = function(evt) {meusDadosProf();};
		document.getElementById("click_assuntos").onclick = function(evt) {assuntosProf();};
		document.getElementById("click_listas").onclick = function(evt) {listasProf();};
		document.getElementById("click_exercicios").onclick = function(evt) {exerciciosProf();};
		document.getElementById("click_alunos").onclick = function(evt) {alunosProf();};
	}
	if(document.getElementById("minhas_disciplinas")){
		document.getElementById("click_meus_dados").onclick = function(evt) {meusDadosAdm();};
		document.getElementById("click_minhas_disciplinas").onclick = function(evt) {minhasDisciplinas();};
		document.getElementById("click_minhas_listas").onclick = function(evt) {minhasListas();};
	}

}