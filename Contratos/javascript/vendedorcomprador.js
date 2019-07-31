$(document).ready(function () {
	//MASCARAS
	$("#cnpj").mask("00.000.000/0000-00");
	$("#cpf").mask("000.000.000-00");
	$("#rg").mask("00.000.000-0");
	$("#cep").mask("00000-000");


	$("#pessoaf").click(selecionarf);
	$("#pessoaj").click(selecionarj);
	$("#pessoaf").change(selecionarf);
	$("#pessoaj").change(selecionarj);
	$("#salvar").click(function (e) {
		if (!nome()) {
			e.preventDefault();
		}
		if (!nacionalidade()) {
			e.preventDefault();
		}
		if (!profissao()) {
			e.preventDefault();
		}
		if (!cpf()) {
			e.preventDefault();
		}
		if (!endereco()) {
			e.preventDefault();
		}
		if (!pessoa()) {
			e.preventDefault();
		}
		if (!sexo()) {
			e.preventDefault();
		}
		if ($("#pessoaf").is(":checked")) {
			if (!cnpjfisico()) {
				e.preventDefault();
			}
		} else if ($("#pessoaj").is(":checked")) {
			if (!cnpj()) {
				e.preventDefault();
			}
		} else {
			$("#msg_pessoa").text("Selecione o tipo de pessoa");
			$("#gpessoa").attr("class", "erro");
			e.preventDefault();
		}

	});
})

function selecionarf() {
	$(".representante").css("display", "none");
	$("#gnomeempresa").css("display", "none");
	$("#gcnpj").css("display", "none");
	$("#genderecoempresa").css("display", "none");
	$("#gcargoempresa").css("display", "none");
	$("#gtipoempresa").css("display", "none");
	$("#gcidadeempresa").css("display", "none");
	$("#gnumeroempresa").css("display", "none");


}

function selecionarj() {
	$(".representante").css("display", "inline");
	$("#gnomeempresa").css("display", "inline");
	$("#gcnpj").css("display", "inline");
	$("#genderecoempresa").css("display", "inline");
	$("#gcargoempresa").css("display", "inline");
	$("#gtipoempresa").css("display", "inline");
	$("#gcidadeempresa").css("display", "inline");
	$("#gnumeroempresa").css("display", "inline");


}

function nome() {
	var a = true;
	$("#nome").attr("class", "certo");
	$("#msg_nome").text("");
	if ($("#nome").val().trim() == "" || $("#nome").val().trim().indexOf(" ") == -1) {
		$("#msg_nome").text("Nome inválido");
		$("#nome").attr("class", "erro");
		a = false;
	}
	return a;
}

function nacionalidade() {
	var a = true;
	$("#nacionalidade").attr("class", "certo");
	$("#msg_nacionalidade").text("");
	if ($("#nacionalidade").val() == "") {
		$("#msg_nacionalidade").text("Nacionalidade inválida");
		$("#nacionalidade").attr("class", "erro");
		a = false;
	}
	return a;
}

function profissao() {
	var a = true;
	$("#profissao").attr("class", "certo");
	$("#msg_profissao").text("");
	if ($("#profissao").val() == "") {
		$("#msg_profissao").text("Profissão inválida");
		$("#profissao").attr("class", "erro");
		a = false;
	}
	return a;
}

function cpf() {
	var a;
	var cpf = $("#cpf").val();

	$("#msg_cpf").text("");
	a = true;
	$("#cpf").attr('class', 'certo');

	while (cpf.indexOf(".") != -1 || cpf.indexOf("-") != -1) {
		cpf = cpf.replace(".", "");
		cpf = cpf.replace("-", "");
	}

	if (cpf.length != 11 || isNaN(cpf)) {
		$("#msg_cpf").text("CPF inválido");
		a = false;
		$("#cpf").attr('class', 'erro');

	}

	var cpfA = cpf.split("");
	var J = 0;
	var l = 11;

	for (i = 0; i <= 8; i++) {

		l--;
		J += cpfA[i] * l;

	}

	J = J % 11;
	if (J == 1 || J == 0) {
		J = 0;
	} else {
		J = 11 - J;
	}

	if (J != cpfA[9]) {
		$('#cpf').attr('class', 'erro');
		$('#msg_cpf').text('CPF invalido');
		return false;
	}

	//alert(J);
	var k = 0;
	l = 12;
	for (i = 0; i <= 9; i++) {
		l--;
		k += cpfA[i] * l;

	}

	k = k % 11;
	if (k == 1 || k == 0) {
		k = 0;
	} else {
		k = 11 - k;
	}
	//alert(k);
	if (k != cpfA[10]) {
		$('#cpf').attr('class', 'erro');
		$('#msg_cpf').text('CPF invalido');
		return false;
	}
	return a;

}

function endereco() {
	var a = true;
	$("#endereco").attr("class", "certo");
	$("#msg_endereco").text("");
	if ($("#endereco").val() == "" || $("#endereco").val().trim().indexOf(" ") == -1) {
		$("#msg_endereco").text("Endereço inválido");
		$("#endereco").attr("class", "erro");
		a = false;
	}
	return a;
}


function pessoa() {
	var a = true;
	$("#gpessoa").attr("class", "certo");
	$("#msg_pessoa").text("");
	if (!$("input[type='radio'][name='pessoa']").is(':checked')) {
		$("#msg_pessoa").text("Tipo de pessoa inválido");
		$("#gpessoa").attr("class", "erro");
		a = false;
	}

	return a;
}


function sexo() {
	var a = true;
	$("#gsexo").attr("class", "certo");
	$("#msg_sexo").text("");
	if (!$("input[type='radio'][name='sexo']").is(':checked')) {
		$("#msg_sexo").text("Sexo inválido");
		$("#gsexo").attr("class", "erro");
		a = false;
	}
	return a;
}

function cnpj() {
	var a = true;
	$("#cnpj").attr("class", "certo");
	$("#msg_cnpj").text("");
	if ($("#cnpj").val() == "") {
		$("#msg_cnpj").text("CNPJ inválido");
		$("#cnpj").attr("class", "erro");
		a = false;
	}
	return a;
}

function cnpjfisico() {
	var a = true;
	$("#cnpj").attr("class", "certo");
	$("#msg_cnpj").text("");
	if ($("#cnpj").val() != "") {
		$("#msg_cnpj").text("CNPJ inválido");
		$("#cnpj").attr("class", "erro");
		a = false;
	}
	return a;
}
