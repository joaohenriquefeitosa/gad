function trocaCampoSenha(){
	document.getElementById("ipass").type = 'password';
	document.getElementById("ipass").value = '';
}

/*Pegar o id do atributo dinamicamente e atribuir seu valor a vazio*/
function limpaCampo(){
}

function limpaCampoNome(){
	document.getElementById("iuser").value = '';
}

function limpaCampoEmail(){
	document.getElementById("iemail").value = '';
}

// Verifica se o campo está vazio

// Verifica o tamanho mínimo e máximo do campo de senha

// Verifica se o e-mail é válido

// Verifica se o campo curso selecionado é válido


window.onload = function(){
	document.getElementById("ipass").onfocus = function(evt){trocaCampoSenha();};
	document.getElementById("iuser").onfocus = function(evt){limpaCampoNome();};
	document.getElementById("iemail").onfocus = function(evt){limpaCampoEmail();};

}