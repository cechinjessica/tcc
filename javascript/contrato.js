$(document).ready(function () {
	setdcriacao();
	$('#entrada').maskMoney({
		thousands: '.',
		decimal: ',',
		allowZero: true,
		allowEmpty: true
	});

	$('#valortotal').maskMoney({
		thousands: '.',
		decimal: ',',
		allowZero: true,
		allowEmpty: true
	});

	$('#valorparcela').maskMoney({
		thousands: '.',
		decimal: ',',
		allowZero: true,
		allowEmpty: true
	});

	$("#dpagamento").mask("00");
	/*$("#valortotal").mask("#.##0,00", {
		reverse: true
	});
	$("#valorparcela").mask("#.##0,00", {
		reverse: true
	});
	$("#entrada").mask("#.##0,00", {
		reverse: true
	});*/


	$("#numeroparcelas").focusout(function (e) {
		if ($("#valortotal").val() != "" & $("#numeroparcelas").val() != "" | $("#entrada").val() != "") {
			gerarparcela();
		}
	});

	$("#entrada").focusout(function (e) {
		if ($("#valortotal").val() != "" & $("#numeroparcelas").val() != "" | $("#entrada").val() != "") {
			gerarparcela();
		}
	});


	$("#rgtestemunha1").mask("0000000000");
	$("#rgtestemunha2").mask("0000000000");

	$("#salvarcontrato").click(function (e) {
		if (!vendedor()) {
			e.preventDefault();
		}
		if (!comprador()) {
			e.preventDefault();
		}
		if (!veiculo()) {
			e.preventDefault();
		}
		if (!dpagamento()) {
			e.preventDefault();
		}
		if (!valortotal()) {
			e.preventDefault();
		}
		if (!numeroparcelas()) {
			e.preventDefault();
		}
		if (!valorparcela()) {
			e.preventDefault();
		}
		if (!juro()) {
			e.preventDefault();
		}
		if (!foro()) {
			e.preventDefault();
		}
		if (!datacriacao()) {
			e.preventDefault();
		}
		if (!ntestemunha1()) {
			e.preventDefault();
		}
		if (!rgtestemunha1()) {
			e.preventDefault();
		}
		if (!ntestemunha2()) {
			e.preventDefault();
		}
		if (!rgtestemunha2()) {
			e.preventDefault();
		}
		if (!lassinatura()) {
			e.preventDefault();
		}
		if (!dassinatura()) {
			e.preventDefault();
		}
		if (!entrada()) {
			e.preventDefault();
		}
		if (!vendedorXproprietario()) {
			e.preventDefault();
		}

	});
})

function vendedor() {
	if ($("#vendedor").hasClass("is-invalid")) {
		$("#vendedor").removeClass("is-invalid");
	} else if ($("#vendedor").hasClass("is-valid")) {
		$("#vendedor").removeClass("is-valid");
	}
	$("#vendedor").addClass("is-valid");
	var a = true;

	if ($("#vendedor").val() == "" || $("#vendedor").val() == $("#comprador").val()) {
		$("#vendedor").addClass("is-invalid");
		a = false;
	}
	return a;
}

function comprador() {
	if ($("#comprador").hasClass("is-invalid")) {
		$("#comprador").removeClass("is-invalid");
	} else if ($("#comprador").hasClass("is-valid")) {
		$("#comprador").removeClass("is-valid");
	}
	$("#comprador").addClass("is-valid");
	var a = true;

	if ($("#comprador").val() == "" || $("#vendedor").val() == $("#comprador").val()) {
		$("#comprador").addClass("is-invalid");
		a = false;
	}
	return a;
}

function veiculo() {
	if ($("#veiculo").hasClass("is-invalid")) {
		$("#veiculo").removeClass("is-invalid");
	} else if ($("#veiculo").hasClass("is-valid")) {
		$("#veiculo").removeClass("is-valid");
	}
	$("#veiculo").addClass("is-valid");
	var a = true;

	if ($("#veiculo").val() == "") {
		$("#veiculo").addClass("is-invalid");
		a = false;
	}
	return a;
}

function dpagamento() {
	if ($("#dpagamento").hasClass("is-invalid")) {
		$("#dpagamento").removeClass("is-invalid");
	} else if ($("#dpagamento").hasClass("is-valid")) {
		$("#dpagamento").removeClass("is-valid");
	}
	$("#dpagamento").addClass("is-valid");
	var a = true;

	var d = parseInt($("#dpagamento").val());
	if (isNaN(d) || d > 31) {
		$("#dpagamento").addClass("is-invalid");
		a = false;
	}
	return a;
}

function valortotal() {
	if ($("#valortotal").hasClass("is-invalid")) {
		$("#valortotal").removeClass("is-invalid");
	} else if ($("#valortotal").hasClass("is-valid")) {
		$("#valortotal").removeClass("is-valid");
	}
	$("#valortotal").addClass("is-valid");
	var a = true;

	if ($("#valortotal").val() == "") {
		$("#valortotal").addClass("is-invalid");
		a = false;
	}
	return a;
}

function numeroparcelas() {
	if ($("#numeroparcelas").hasClass("is-invalid")) {
		$("#numeroparcelas").removeClass("is-invalid");
	} else if ($("#numeroparcelas").hasClass("is-valid")) {
		$("#numeroparcelas").removeClass("is-valid");
	}
	$("#numeroparcelas").addClass("is-valid");
	var a = true;

	if ($("#numeroparcelas").val() == "") {
		$("#numeroparcelas").addClass("is-invalid");
		a = false;
	}
	return a;
}

function valorparcela() {
	if ($("#valorparcela").hasClass("is-invalid")) {
		$("#valorparcela").removeClass("is-invalid");
	} else if ($("#valorparcela").hasClass("is-valid")) {
		$("#valorparcela").removeClass("is-valid");
	}
	$("#valorparcela").addClass("is-valid");
	var a = true;

	if ($("#valorparcela").val() == "") {
		$("#valorparcela").addClass("is-invalid");
		a = false;
	}
	return a;
}

function gerarparcela() {
	if ($("#entrada").hasClass("is-invalid")) {
		$("#entrada").removeClass("is-invalid");
	}

	var total = $("#valortotal").val();
	var numero = parseInt($("#numeroparcelas").val());
	var entrada = $("#entrada").val();

	while (total.indexOf(".") != -1) {
		total = total.replace(".", "");
	}
	total = total.replace(",", ".");
	total = parseFloat(total);

	while (entrada.indexOf(".") != -1) {
		entrada = entrada.replace(".", "");
	}
	entrada = entrada.replace(",", ".");
	entrada = parseFloat(entrada);


	if (total == entrada) {
		$("#numeroparcelas").val(0);
		$("#valorparcela").val(0);

	} else if (entrada > total) {
		$("#entrada").addClass("is-invalid");

	} else if (!isNaN(total) & !isNaN(numero)) {
		if (isNaN(entrada)) {
			var parcela = parseFloat(total / numero);
			$("#valorparcela").val(parcela.toFixed(2));
			$("#entrada").val(0);
		} else {
			var saldo = total - entrada;
			var parcela = parseFloat(saldo / numero);
			parcela = parcela.toFixed(2);
			parcela = parcela.replace(".", ",");
			$("#valorparcela").val(parcela);
			/*parcela = parseFloat(parcela.toFixed(2));
			$("#valorparcela").maskMoney('mask', parcela, {
				thousands: '.',
				decimal: ',',
				allowZero: true,
				allowEmpty: true
			});*/
		}
	}
}

function juro() {
	if ($("input[name='juro']").hasClass("erro")) {
		$("input[name='juro']").removeClass("erro");
	} else if ($("input[name='juro']").hasClass("certo")) {
		$("input[name='juro']").removeClass("certo");
	}
	$("input[name='juro']").addClass("certo");
	var a = true;

	if (!$("input[name='juro']").is(':checked')) {
		$("#msg_juro").css("color", "red");
		$("#msg_juro").text("*Juro inválido");
		$("input[name='juro']").addClass("erro");
		a = false;
	}
	return a;
}

function foro() {
	if ($("#foro").hasClass("is-invalid")) {
		$("#foro").removeClass("is-invalid");
	} else if ($("#foro").hasClass("is-valid")) {
		$("#foro").removeClass("is-valid");
	}
	$("#foro").addClass("is-valid");
	var a = true;

	if ($("#foro").val() == "") {
		$("#foro").addClass("is-invalid");
		a = false;
	}
	return a;
}

function datacriacao() {
	if ($("#datacriacao").hasClass("is-invalid")) {
		$("#datacriacao").removeClass("is-invalid");
	} else if ($("#datacriacao").hasClass("is-valid")) {
		$("#datacriacao").removeClass("is-valid");
	}
	$("#datacriacao").addClass("is-valid");
	var a = true;

	if ($("#datacriacao").val() == "") {
		$("#datacriacao").addClass("is-invalid");
		a = false;
	}
	return a;
}

function ntestemunha1() {
	if ($("#ntestemunha1").hasClass("is-invalid")) {
		$("#ntestemunha1").removeClass("is-invalid");
	} else if ($("#ntestemunha1").hasClass("is-valid")) {
		$("#ntestemunha1").removeClass("is-valid");
	}
	$("#ntestemunha1").addClass("is-valid");
	var a = true;

	var nome = $("#ntestemunha1").val();
	if (nome.trim() == "" || nome.trim().indexOf(" ") == -1) {
		$("#ntestemunha1").addClass("is-invalid");
		a = false;
	}
	return a;
}

function rgtestemunha1() {
	if ($("#rgtestemunha1").hasClass("is-invalid")) {
		$("#rgtestemunha1").removeClass("is-invalid");
	} else if ($("#rgtestemunha1").hasClass("is-valid")) {
		$("#rgtestemunha1").removeClass("is-valid");
	}
	$("#rgtestemunha1").addClass("is-valid");
	var a = true;

	if ($("#rgtestemunha1").val().trim() == "") {
		$("#rgtestemunha1").addClass("is-invalid");
		a = false;
	}
	return a;
}

function ntestemunha2() {
	if ($("#ntestemunha2").hasClass("is-invalid")) {
		$("#ntestemunha2").removeClass("is-invalid");
	} else if ($("#ntestemunha2").hasClass("is-valid")) {
		$("#ntestemunha2").removeClass("is-valid");
	}
	$("#ntestemunha2").addClass("is-valid");
	var a = true;

	var nome = $("#ntestemunha2").val();
	if (nome.trim() == "" || nome.trim().indexOf(" ") == -1) {
		$("#ntestemunha2").addClass("is-invalid");
		a = false;
	}
	return a;
}

function rgtestemunha2() {
	if ($("#rgtestemunha2").hasClass("is-invalid")) {
		$("#rgtestemunha2").removeClass("is-invalid");
	} else if ($("#rgtestemunha2").hasClass("is-valid")) {
		$("#rgtestemunha2").removeClass("is-valid");
	}
	$("#rgtestemunha2").addClass("is-valid");
	var a = true;

	if ($("#rgtestemunha2").val().trim() == "") {
		$("#rgtestemunha2").addClass("is-invalid");
		a = false;
	}
	return a;
}

function lassinatura() {
	if ($("#lassinatura").hasClass("is-invalid")) {
		$("#lassinatura").removeClass("is-invalid");
	} else if ($("#lassinatura").hasClass("is-valid")) {
		$("#lassinatura").removeClass("is-valid");
	}
	$("#lassinatura").addClass("is-valid");
	var a = true;

	if ($("#lassinatura").val() == "") {
		$("#lassinatura").addClass("is-invalid");
		a = false;
	}
	return a;
}

function dassinatura() {
	if ($("#dassinatura").hasClass("is-invalid")) {
		$("#dassinatura").removeClass("is-invalid");
	} else if ($("#dassinatura").hasClass("is-valid")) {
		$("#dassinatura").removeClass("is-valid");
	}
	$("#dassinatura").addClass("is-valid");
	var a = true;

	var hoje = new Date();
	hoje.setHours(0, 0, 0, 0);
	var input = $("#dassinatura").val()
	var data = new Date(input);
	data.setHours(0, 0, 0, 0);
	data.setDate(data.getDate() + 1);

	if (data.valueOf() < hoje.valueOf() | data.toString() == "Invalid Date") {
		$("#dassinatura").addClass("is-invalid");
		a = false;
	}

	return a;
}

function entrada() {
	if ($("#entrada").hasClass("is-invalid")) {
		$("#entrada").removeClass("is-invalid");
	} else if ($("#entrada").hasClass("is-valid")) {
		$("#entrada").removeClass("is-valid");
	}
	$("#entrada").addClass("is-valid");
	var a = true;

	if ($("#entrada").val() == "") {
		$("#entrada").addClass("is-invalid");
		a = false;
	}
	return a;
}




function setdcriacao() {
	var agora = new Date().toLocaleString()
	$("#datacriacao").val(agora);
}


function getid(idtd, cpftd, nometd) {
	var id = idtd;
	var cpf = cpftd;
	var nome = nometd.replace("+", " ");
	while (nome.indexOf("+") != -1) {
		nome = nome.replace("+", " ");
	}
	$("#idvend").val(id);
	$("#cpfvreadonly").val(cpf);
	$("#vendedor").val(nome);

	$('#modalVendedor').modal('hide');
}

function getidcomp(idtd, cpftd, nometd) {
	var id = idtd;
	var cpf = cpftd;
	var nome = nometd.replace("+", " ");
	while (nome.indexOf("+") != -1) {
		nome = nome.replace("+", " ");
	}

	$("#idcomp").val(id);
	$("#cpfcreadonly").val(cpftd);
	$("#comprador").val(nome);

	$('#modalComprador').modal('hide');
}

function getidvei(idtd, nometd, placatd, vtotaltd, prop) {
	var id = idtd;
	var placa = placatd;
	var vtotal = vtotaltd;

	var nome = nometd.replace("+", " ");
	while (nome.indexOf("+") != -1) {
		nome = nome.replace("+", " ");
	}

	while (vtotal.indexOf(".") != -1) {
		vtotal = vtotal.replace(".", ",");
	}

	$("#idvei").val(id);
	$("#placareadonly").val(placa);
	$("#veiculo").val(nome);
	$("#valortotal").val(vtotal);
	$("#prop").val(prop);

	$('#modalVeiculo').modal('hide');

}

function vendedorXproprietario() {
	$("#msg_vendxprop").text("")
	$("#msg_vendxprop").css("color", "");
	var vendedor = $('#vendedor').val();
	var prop = $('#prop').val();

	var proprietario = prop.replace("+", " ");
	while (proprietario.indexOf("+") != -1) {
		proprietario = proprietario.replace("+", " ");
	}
	var a = true;

	if (vendedor != proprietario) {
		$("#vendedor").addClass("is-invalid");
		$("#veiculo").addClass("is-invalid");
		a = false;
		$("#msg_vendxprop").html("*Vendedor e Proprietário do Veículo não são a mesma pessoa! </p> <p> Ou, em caso de edição, é preciso selecionar novamente o veículo e o vendedor.")
		$("#msg_vendxprop").css("color", "red");
	}
	return a;
}
