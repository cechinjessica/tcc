$(document).ready(function () {
    setdcriacao();

    $("#dpagamento").mask("00");
    $("#valortotal").mask("###0.00", {
        reverse: true
    });
    $("#numeroparcelas").mask("00");
    $("#vparcela").mask("###0.00", {
        reverse: true
    });

    $("#numeroparcelas").focusout(function (e) {
        if ($("#valortotal").val() != "" & $("#numeroparcelas").val() != "") {
            gerarparcela();
        }
    });

    $("#valortotal").focusout(function (e) {
        if ($("#valortotal").val() != "" & $("#numeroparcelas").val() != "") {
            gerarparcela();
        }
    });

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
    });
})

function vendedor() {
    if ($("#vendedor").hasClass("erro")) {
        $("#vendedor").removeClass("erro");
    } else if ($("#vendedor").hasClass("certo")) {
        $("#vendedor").removeClass("certo");
    }
    $("#vendedor").addClass("certo");
    var a = true;
    $("#msg_vendedor").text("");

    if ($("#vendedor").val() == "") {
        $("#msg_vendedor").text("*Vendedor inválido");
        $("#msg_vendedor").css("color", "red");
        $("#vendedor").addClass("erro");
        a = false;
    }
    return a;
}

function comprador() {
    if ($("#comprador").hasClass("erro")) {
        $("#comprador").removeClass("erro");
    } else if ($("#comprador").hasClass("certo")) {
        $("#comprador").removeClass("certo");
    }
    $("#comprador").addClass("certo");
    var a = true;
    $("#msg_comprador").text("");

    if ($("#comprador").val() == "") {
        $("#msg_comprador").text("*Comprador inválido");
        $("#msg_comprador").css("color", "red");
        $("#comprador").addClass("erro");
        a = false;
    }
    return a;
}

function veiculo() {
    if ($("#veiculo").hasClass("erro")) {
        $("#veiculo").removeClass("erro");
    } else if ($("#veiculo").hasClass("certo")) {
        $("#veiculo").removeClass("certo");
    }
    $("#veiculo").addClass("certo");
    var a = true;
    $("#msg_veiculo").text("");

    if ($("#veiculo").val() == "") {
        $("#msg_veiculo").text("*Veículo inválido");
        $("#msg_veiculo").css("color", "red");
        $("#veiculo").addClass("erro");
        a = false;
    }
    return a;
}

function dpagamento() {
    if ($("#dpagamento").hasClass("erro")) {
        $("#dpagamento").removeClass("erro");
    } else if ($("#dpagamento").hasClass("certo")) {
        $("#dpagamento").removeClass("certo");
    }
    $("#dpagamento").addClass("certo");
    var a = true;
    $("#msg_dpagamento").text("");

    var d = parseInt($("#dpagamento").val());
    if (isNaN(d) || d > 31) {
        $("#msg_dpagamento").text("*Dia inválido");
        $("#msg_dpagamento").css("color", "red");
        $("#dpagamento").addClass("erro");
        a = false;
    }
    return a;
}

function valortotal() {
    if ($("#valortotal").hasClass("erro")) {
        $("#valortotal").removeClass("erro");
    } else if ($("#valortotal").hasClass("certo")) {
        $("#valortotal").removeClass("certo");
    }
    $("#valortotal").addClass("certo");
    var a = true;
    $("#msg_valortotal").text("");

    if ($("#valortotal").val() == "") {
        $("#msg_valortotal").text("*Valor total inválido");
        $("#msg_valortotal").css("color", "red");
        $("#valortotal").addClass("erro");
        a = false;
    }
    return a;
}

function numeroparcelas() {
    if ($("#numeroparcelas").hasClass("erro")) {
        $("#numeroparcelas").removeClass("erro");
    } else if ($("#numeroparcelas").hasClass("certo")) {
        $("#numeroparcelas").removeClass("certo");
    }
    $("#numeroparcelas").addClass("certo");
    var a = true;
    $("#msg_numeroparcelas").text("");

    if ($("#numeroparcelas").val() == "") {
        $("#msg_numeroparcelas").text("*Quantidade inválida");
        $("#msg_numeroparcelas").css("color", "red");
        $("#numeroparcelas").addClass("erro");
        a = false;
    }
    return a;
}

function valorparcela() {
    if ($("#valorparcela").hasClass("erro")) {
        $("#valorparcela").removeClass("erro");
    } else if ($("#valorparcela").hasClass("certo")) {
        $("#valorparcela").removeClass("certo");
    }
    $("#valorparcela").addClass("certo");
    var a = true;
    $("#msg_valorparcela").text("");

    if ($("#valorparcela").val() == "") {
        $("#msg_valorparcela").text("*Valor inválido");
        $("#msg_valorparcela").css("color", "red");
        $("#valorparcela").addClass("erro");
        a = false;
    }
    return a;
}

function gerarparcela() {
    var total = parseFloat($("#valortotal").val());
    var numero = parseInt($("#numeroparcelas").val());
    var parcela = parseFloat(total / numero);
    $("#valorparcela").val(Math.ceil(parcela));
}

function juro() {
    if ($("input[name='juro']").hasClass("erro")) {
        $("input[name='juro']").removeClass("erro");
    } else if ($("input[name='juro']").hasClass("certo")) {
        $("input[name='juro']").removeClass("certo");
    }
    $("input[name='juro']").addClass("certo");
    var a = true;
    $("#msg_juro").text("");

    if (!$("input[name='juro']").is(':checked')) {
        $("#msg_juro").text("*Juro inválido");
        $("#msg_juro").css("color", "red");
        $("input[name='juro']").addClass("erro");
        a = false;
    }
    return a;
}

function foro() {
    if ($("#foro").hasClass("erro")) {
        $("#foro").removeClass("erro");
    } else if ($("#foro").hasClass("certo")) {
        $("#foro").removeClass("certo");
    }
    $("#foro").addClass("certo");
    var a = true;
    $("#msg_foro").text("");

    if ($("#foro").val() == "") {
        $("#msg_foro").text("*Foro inválido");
        $("#msg_foro").css("color", "red");
        $("#foro").addClass("erro");
        a = false;
    }
    return a;
}

function datacriacao() {
    if ($("#datacriacao").hasClass("erro")) {
        $("#datacriacao").removeClass("erro");
    } else if ($("#datacriacao").hasClass("certo")) {
        $("#datacriacao").removeClass("certo");
    }
    $("#datacriacao").addClass("certo");
    var a = true;
    $("#msg_datacriacao").text("");

    if ($("#datacriacao").val() == "") {
        $("#msg_datacriacao").text("*Data inválida");
        $("#msg_datacriacao").css("color", "red");
        $("#datacriacao").addClass("erro");
        a = false;
    }
    return a;
}

function ntestemunha1() {
    if ($("#ntestemunha1").hasClass("erro")) {
        $("#ntestemunha1").removeClass("erro");
    } else if ($("#ntestemunha1").hasClass("certo")) {
        $("#ntestemunha1").removeClass("certo");
    }
    $("#ntestemunha1").addClass("certo");
    var a = true;
    $("#msg_ntestemunha1").text("");

    if ($("#ntestemunha1").val() == "") {
        $("#msg_ntestemunha1").text("*Nome inválido");
        $("#msg_ntestemunha1").css("color", "red");
        $("#ntestemunha1").addClass("erro");
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

function getidvei(idtd, nometd, placatd, vtotaltd) {
    var id = idtd;
    var nome = nometd;
    var placa = placatd;
    var vtotal = vtotaltd;

    $("#idvei").val(id);
    $("#placareadonly").val(placa);
    $("#veiculo").val(nome);
    $("#valortotal").val(vtotal);

    $('#modalVeiculo').modal('hide');

}
