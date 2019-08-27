$(document).ready(function () {
    //MASCARAS
    $("#ano").mask("0000");
    $("#modelo").mask("0000");
    $("#cor").mask("SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS");
    $("#valor").mask("###0.00", {
        reverse: true
    });

    $("#salvarveiculo").click(function (e) {
        if (!nome()) {
            e.preventDefault();
        }

        if (!marca()) {
            e.preventDefault();
        }
        if (!ano()) {
            e.preventDefault();
        }
        if (!modelo()) {
            e.preventDefault();
        }
        if (!chassi()) {
            e.preventDefault();
        }
        if (!cor()) {
            e.preventDefault();
        }
        if (!placa()) {
            e.preventDefault();
        }
        if (!renavam()) {
            e.preventDefault();
        }
        if (!proprietario()) {
            e.preventDefault();
        }
        if (!valor()) {
            e.preventDefault();
        }
    });
})

function nome() {
    if ($("#nomevei").hasClass("erro")) {
        $("#nomevei").removeClass("erro");
    } else if ($("#nomevei").hasClass("certo")) {
        $("#nomevei").removeClass("certo");
    }
    $("#nomevei").addClass("certo");
    var a = true;
    $("#msg_nomevei").text("");
    alert($("#nomevei").val().trim());
    if ($("#nomevei").val().trim() == "") {
        $("#msg_nomevei").text("*Nome inválido");
        $("#msg_nomevei").css("color", "red");
        $("#nomevei").addClass("erro");
        a = false;
    }
    return a;
}

function marca() {
    if ($("#marca").hasClass("erro")) {
        $("#marca").removeClass("erro");
    } else if ($("#marca").hasClass("certo")) {
        $("#marca").removeClass("certo");
    }
    $("#marca").addClass("certo");
    var a = true;
    $("#msg_marca").text("");

    if ($("#marca").val().trim() == "") {
        $("#msg_marca").text("*Marca inválida");
        $("#msg_marca").css("color", "red");
        $("#marca").addClass("erro");
        a = false;
    }
    return a;
}


function ano() {
    if ($("#ano").hasClass("erro")) {
        $("#ano").removeClass("erro");
    } else if ($("#ano").hasClass("certo")) {
        $("#ano").removeClass("certo");
    }
    $("#ano").addClass("certo");
    var a = true;
    $("#msg_ano").text("");

    if ($("#ano").val() == "" || $("#ano").val().length > 4) {
        $("#msg_ano").text("*Ano inválido");
        $("#msg_ano").css("color", "red");
        $("#ano").addClass("erro");
        a = false;
    }
    return a;
}

function modelo() {
    if ($("#modelo").hasClass("erro")) {
        $("#modelo").removeClass("erro");
    } else if ($("#modelo").hasClass("certo")) {
        $("#modelo").removeClass("certo");
    }
    $("#modelo").addClass("certo");
    var a = true;
    $("#msg_modelo").text("");

    var ano = parseInt($("#ano").val());
    var modelo = parseInt($("#modelo").val());

    if (modelo == "" || modelo.length > 4) {
        $("#msg_modelo").text("*Modelo inválido");
        $("#msg_modelo").css("color", "red");
        $("#modelo").addClass("erro");
        return a = false;
    }
    if (!(modelo == ano - 1 | modelo == ano + 1 | modelo == ano)) {
        $("#msg_modelo").text("*Modelo inválido");
        $("#msg_modelo").css("color", "red");
        $("#modelo").addClass("erro");
        a = false;
    }

    return a;
}

function chassi() {
    if ($("#chassi").hasClass("erro")) {
        $("#chassi").removeClass("erro");
    } else if ($("#chassi").hasClass("certo")) {
        $("#chassi").removeClass("certo");
    }
    $("#chassi").addClass("certo");
    var a = true;
    $("#msg_chassi").text("");

    if ($("#chassi").val().trim() == "" || $("#chassi").val().length > 17) {
        $("#msg_chassi").text("*Chassi inválido");
        $("#msg_chassi").css("color", "red");
        $("#chassi").addClass("erro");
        a = false;
    }
    return a;
}

function cor() {
    if ($("#cor").hasClass("erro")) {
        $("#cor").removeClass("erro");
    } else if ($("#cor").hasClass("certo")) {
        $("#cor").removeClass("certo");
    }
    $("#cor").addClass("certo");
    var a = true;
    $("#msg_cor").text("");

    if ($("#cor").val().trim() == "") {
        $("#msg_cor").text("*Cor inválida");
        $("#msg_cor").css("color", "red");
        $("#cor").addClass("erro");
        a = false;
    }
    return a;
}


function placa() {
    if ($("#placa").hasClass("erro")) {
        $("#placa").removeClass("erro");
    } else if ($("#placa").hasClass("certo")) {
        $("#placa").removeClass("certo");
    }
    $("#placa").addClass("certo");
    var a = true;
    $("#msg_placa").text("");

    if ($("#placa").val().trim() == "" || $("#placa").val().length > 8) {
        $("#msg_placa").text("*Placa inválida");
        $("#msg_placa").css("color", "red");
        $("#placa").addClass("erro");
        a = false;
    }
    return a;
}


function renavam() {
    if ($("#renavam").hasClass("erro")) {
        $("#renavam").removeClass("erro");
    } else if ($("#renavam").hasClass("certo")) {
        $("#renavam").removeClass("certo");
    }
    $("#renavam").addClass("certo");
    var a = true;
    $("#msg_renavam").text("");

    if ($("#renavam").val().trim() == "" || $("#renavam").val().length > 11) {
        $("#msg_renavam").text("*Renavam inválida");
        $("#msg_renavam").css("color", "red");
        $("#renavam").addClass("erro");
        a = false;
    }
    return a;
}


function proprietario() {
    if ($("#proprietario").hasClass("erro")) {
        $("#proprietario").removeClass("erro");
    } else if ($("#proprietario").hasClass("certo")) {
        $("#proprietario").removeClass("certo");
    }
    $("#proprietario").addClass("certo");
    var a = true;
    $("#msg_proprietario").text("");

    if ($("#proprietario").val().trim() == "" || $("#proprietario").val().trim().indexOf(" ") == -1) {
        $("#msg_proprietario").text("*Proprietário inválido");
        $("#msg_proprietario").css("color", "red");
        $("#proprietario").addClass("erro");
        a = false;
    }
    return a;
}

function valor() {
    if ($("#valorvei").hasClass("erro")) {
        $("#valorvei").removeClass("erro");
    } else if ($("#valorvei").hasClass("certo")) {
        $("#valorvei").removeClass("certo");
    }
    $("#valorvei").addClass("certo");
    var a = true;
    $("#msg_valorvei").text("");

    if ($("#valorvei").val().trim() == "") {
        $("#msg_valorvei").text("*Valor inválido");
        $("#msg_valorvei").css("color", "red");
        $("#valorvei").addClass("erro");
        a = false;
    }
    return a;
}
