$(document).ready(function () {
    setdcriacao();

    $("#dpagamento").mask("00");
    $("#valortotal").mask("###0.00", {
        reverse: true
    });
    $("#vparcela").mask("###0.00", {
        reverse: true
    });
    $("#entrada").mask("###0.00", {
        reverse: true
    });


    $("#numeroparcelas").focusout(function (e) {
        if ($("#valortotal").val() != "" & $("#numeroparcelas").val() != "" & $("#entrada").val() != "") {
            gerarparcela();
        }
    });

    $("#valortotal").focusout(function (e) {
        if ($("#valortotal").val() != "" & $("#numeroparcelas").val() != "" & $("#entrada").val() != "") {
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
    var total = parseFloat($("#valortotal").val());
    var numero = parseInt($("#numeroparcelas").val());
    var entrada = parseFloat($("#entrada").val());

    var saldo = total - entrada;
    var parcela = parseFloat(saldo / numero);
    $("#valorparcela").val(parcela.toFixed(2));
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

    if (data.valueOf() < hoje.valueOf()) {
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

function getidvei(idtd, nometd, placatd, vtotaltd) {
    var id = idtd;
    var placa = placatd;
    var vtotal = vtotaltd;

    var nome = nometd.replace("+", " ");
    while (nome.indexOf("+") != -1) {
        nome = nome.replace("+", " ");
    }

    $("#idvei").val(id);
    $("#placareadonly").val(placa);
    $("#veiculo").val(nome);
    $("#valortotal").val(vtotal);

    $('#modalVeiculo').modal('hide');

}
