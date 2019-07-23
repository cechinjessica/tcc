$(document).ready(function () {
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
	if ($("#usuario").hasClass("erro")) {
		$("#usuario").removeClass("erro");
	} else if ($("#usuario").hasClass("certo")) {
		$("#usuario").removeClass("certo");
	}

	$("#usuario").addClass("certo");
	var a = true;
	$("#msg_usuario").text("");

	if ($("#usuario").val() == "") {
		$("#msg_usuario").text("Usuário inválido");
		$("#msg_usuario").css("color", "red");
		$("#usuario").addClass("erro");
		a = false;
	}
	return a;
}

function senha() {
	if ($("#senha").hasClass("erro")) {
		$("#senha").removeClass("erro");
	} else if ($("#senha").hasClass("certo")) {
		$("#senha").removeClass("certo");
	}
	$("#senha").addClass("certo");
	var a = true;
	$("#msg_senha").text("");

	if ($("#senha").val() == "") {
		$("#msg_senha").text("Senha inválido");
		$("#msg_senha").css("color", "red");
		$("#senha").addClass("erro");
		a = false;
	}
	return a;
}
