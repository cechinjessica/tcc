$(document).ready(function () {
	$("#logar").click(function (e) {
		if (!login()) {
			e.preventDefault();
		}
		if (!senha()) {
			e.preventDefault();
		}

	});
	$("#cadastre").click(function (e) {
		if (!login()) {
			e.preventDefault();
		}
		if (!senha()) {
			e.preventDefault();
		}

	});

})


function login() {
	$("#usuario").attr("class", "certo");
	var a = true;
	$("#msg_usuario").text("");

	if ($("#usuario").val() == "") {
		$("#msg_usuario").text("Usuário inválido");
		$("#usuario").attr("class", "erro");
		a = false;
	}
	return a;
}

function senha() {
	$("#senha").attr("class", "certo");
	var a = true;
	$("#msg_senha").text("");

	if ($("#senha").val() == "") {
		$("#msg_senha").text("Senha inválido");
		$("#senha").attr("class", "erro");
		a = false;
	}
	return a;
}

function nsenha() {
	$("#senha").attr("class", "certo");
	var a = true;
	$("#msg_senha").text("");

	if ($("#senha").val() == "") {
		$("#msg_senha").text("Senha inválido");
		$("#senha").attr("class", "erro");
		a = false;
	}
	return a;
}
