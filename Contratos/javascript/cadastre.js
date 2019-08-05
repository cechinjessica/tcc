$(document).ready(function () {
	$("#cadastre").click(function (e) {
		if (!login()) {
			e.preventDefault();
		}
		if (!senha()) {
			e.preventDefault();
		}
		if (!nome()) {
			e.preventDefault();
		}
		if (!email()) {
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

	if ($("#senha").val().length < 6) {
		$("#msg_senha").text("Senha inválida");
		$("#msg_senha").css("color", "red");
		$("#senha").addClass("erro");
		a = false;
	}
	return a;
}


function nome() {
	if ($("#nome").hasClass("erro")) {
		$("#nome").removeClass("erro");
	} else if ($("#nome").hasClass("certo")) {
		$("#nome").removeClass("certo");
	}

	$("#nome").addClass("certo");
	var a = true;
	$("#msg_nome").text("");

	if ($("#nome").val() == "") {
		$("#msg_nome").text("Nome inválido");
		$("#msg_nome").css("color", "red");
		$("#nome").addClass("erro");
		a = false;
	}
	return a;
}

function email() {
	if ($("#email").hasClass("erro")) {
		$("#email").removeClass("erro");
	} else if ($("#email").hasClass("certo")) {
		$("#email").removeClass("certo");
	}

	$("#email").addClass("certo");
	var a = true;
	$("#msg_email").text("");

	if ($("#email").val() == "") {
		$("#msg_email").text("Email inválido");
		$("#msg_email").css("color", "red");
		$("#email").addClass("erro");
		a = false;
	}
	return a;
}
