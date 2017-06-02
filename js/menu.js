function meusDados(){
	document.getElementById("meus_dados").style.display = 'block';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}

function cursos(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'block';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_cursos").style.display = 'block';
	document.getElementById("click_sub_professores").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}

function disciplinas(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'block';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'block';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'none';
}

function professores(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'block';
	document.getElementById("alunos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'block';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}

function alunos(){
	document.getElementById("meus_dados").style.display = 'none';
	document.getElementById("cursos").style.display = 'none';
	document.getElementById("disciplinas").style.display = 'none';
	document.getElementById("professores").style.display = 'none';
	document.getElementById("alunos").style.display = 'block';
	document.getElementById("click_sub_cursos").style.display = 'none';
	document.getElementById("click_sub_professores").style.display = 'none';
	document.getElementById("click_sub_disciplinas").style.display = 'none';
}


window.onload = function(){
	document.getElementById("click_meus_dados").onclick = function(evt) {meusDados();};
	document.getElementById("click_cursos").onclick = function(evt) {cursos();};
	document.getElementById("click_disciplinas").onclick = function(evt) {disciplinas();};
	document.getElementById("click_professores").onclick = function(evt) {professores();};
	document.getElementById("click_alunos").onclick = function(evt) {alunos();};

}