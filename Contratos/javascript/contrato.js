$(document).ready(function () {
    $("#dpagamento").mask("00");
    $("#valortotal").mask("###0.00", {
        reverse: true
    });
    $("#numeroparcelas").mask("00");
    $("#vparcela").mask("###0.00", {
        reverse: true
    });

    dcriacao();
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
        if (!vprcela()) {
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

function vparcela() {
    if ($("#vparcela").hasClass("erro")) {
        $("#vparcela").removeClass("erro");
    } else if ($("#vparcela").hasClass("certo")) {
        $("#vparcela").removeClass("certo");
    }
    $("#vparcela").addClass("certo");
    var a = true;
    $("#msg_vparcela").text("");

    if ($("#vparcela").val() == "") {
        $("#msg_vparcela").text("*Valor inválido");
        $("#msg_vparcela").css("color", "red");
        $("#vparcela").addClass("erro");
        a = false;
    }
    return a;
}

function dcriacao() {
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

function getidvei(idtd, nometd, placatd) {
    var id = idtd;
    var nome = nometd;
    var placa = placatd;

    $("#idvei").val(id);
    $("#placareadonly").val(placa);
    $("#veiculo").val(nome);

    $('#modalVeiculo').modal('hide');

}
