$(document).ready(function () {
    //MASCARAS
    $("#ano").mask("0000");
    $("#modelo").mask("0000");
    $("#valor").mask("###0.00", {
        reverse: true
    });

    $("#salvar").click(function (e) {
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
        if (!cidadeempresafisico()) {
            e.preventDefault();
        }
        if (!numeroempresafisico()) {
            e.preventDefault();
        }

    });
})

function nome() {
    if ($("#nome").hasClass("erro")) {
        $("#nome").removeClass("erro");
    } else if ($("#nome").hasClass("certo")) {
        $("#nome").removeClass("certo");
    }
    $("#nome").addClass("certo");
    var a = true;
    $("#msg_nome").text("");

    if ($("#nome").val().trim() == "") {
        $("#msg_nome").text("*Nome inválido");
        $("#msg_nome").css("color", "red");
        $("#nome").addClass("erro");
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

    var ano = $("#ano").val();
    var modelo = $("#modelo").val();

    if (modelo == "" || modelo.length > 4 || (modelo != (ano - 1) | modelo != (ano + 1) | modelo == ano)) {
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


function endereco() {
    if ($("#endereco").hasClass("erro")) {
        $("#endereco").removeClass("erro");
    } else if ($("#endereco").hasClass("certo")) {
        $("#endereco").removeClass("certo");
    }
    $("#endereco").addClass("certo");
    var a = true;
    $("#msg_endereco").text("");

    if ($("#endereco").val().trim() == "" || $("#endereco").val().trim().indexOf(" ") == -1) {
        $("#msg_endereco").text("*Endereço inválido");
        $("#msg_endereco").css("color", "red");
        $("#endereco").addClass("erro");
        a = false;
    }
    return a;
}


function pessoa() {
    if ($("input[name='pessoa']").hasClass("erro")) {
        $("input[name='pessoa']").removeClass("erro");
    } else if ($("input[name='pessoa']").hasClass("certo")) {
        $("input[name='pessoa']").removeClass("certo");
    }
    $("input[name='pessoa']").addClass("certo");
    var a = true;
    $("#msg_pessoa").text("");

    if (!$("input[name='pessoa']").is(':checked')) {
        $("#msg_pessoa").text("*Tipo de pessoa inválido");
        $("#msg_pessoa").css("color", "red");
        $("input[name='pessoa']").addClass("erro");
        a = false;
    }
    return a;
}

function numero() {
    if ($("#numero").hasClass("erro")) {
        $("#numero").removeClass("erro");
    } else if ($("#numero").hasClass("certo")) {
        $("#numero").removeClass("certo");
    }
    $("#numero").addClass("certo");
    var a = true;
    $("#msg_numero").text("");

    if ($("#numero").val().trim() == "") {
        $("#msg_numero").text("*Número inválido");
        $("#msg_numero").css("color", "red");
        $("#numero").addClass("erro");
        a = false;
    }
    return a;
}

function cidade() {
    if ($("#cidade").hasClass("erro")) {
        $("#cidade").removeClass("erro");
    } else if ($("#cidade").hasClass("certo")) {
        $("#cidade").removeClass("certo");
    }
    $("#cidade").addClass("certo");
    var a = true;
    $("#msg_cidade").text("");

    if ($("#cidade").val().trim() == "") {
        $("#msg_cidade").text("*Cidade inválido");
        $("#msg_cidade").css("color", "red");
        $("#cidade").addClass("erro");
        a = false;
    }
    return a;
}

function cep() {
    if ($("#cep").hasClass("erro")) {
        $("#cep").removeClass("erro");
    } else if ($("#cep").hasClass("certo")) {
        $("#cep").removeClass("certo");
    }
    $("#cep").addClass("certo");
    var a = true;
    $("#msg_cep").text("");

    if ($("#cep").val() < 8) {
        $("#msg_cep").text("*CEP inválido");
        $("#msg_cep").css("color", "red");
        $("#cep").addClass("erro");
        a = false;
    }
    return a;
}

function sexo() {
    if ($("input[name='sexo']").hasClass("erro")) {
        $("input[name='sexo']").removeClass("erro");
    } else if ($("input[name='sexo']").hasClass("certo")) {
        $("input[name='sexo']").removeClass("certo");
    }
    $("input[name='sexo']").addClass("certo");
    var a = true;
    $("#msg_sexo").text("");

    if (!$("input[type='radio'][name='sexo']").is(':checked')) {
        $("#msg_sexo").text("*Sexo inválido");
        $("#msg_sexo").css("color", "red");
        $("input[name='sexo']").addClass("erro");
        a = false;
    }
    return a;
}

function nomeempresa() {
    if ($("#nomeempresa").hasClass("erro")) {
        $("#nomeempresa").removeClass("erro");
    } else if ($("#nomeempresa").hasClass("certo")) {
        $("#nomeempresa").removeClass("certo");
    }
    $("#nomeempresa").addClass("certo");
    var a = true;
    $("#msg_nomeempresa").text("");

    if ($("#nomeempresa").val().trim() == "" || $("#nomeempresa").val().trim().indexOf(" ") == -1) {
        $("#msg_nomeempresa").text("*Nome da empresa inválido");
        $("#msg_nomeempresa").css("color", "red");
        $("#nomeempresa").addClass("erro");
        a = false;
    }
    return a;
}

function nomeempresafisico() {
    if ($("#nomeempresa").hasClass("erro")) {
        $("#nomeempresa").removeClass("erro");
    } else if ($("#nomeempresa").hasClass("certo")) {
        $("#nomeempresa").removeClass("certo");
    }
    $("#nomeempresa").addClass("certo");
    var a = true;
    $("#msg_nomeempresa").text("");

    if ($("#nomeempresa").val() != "") {
        $("#msg_nomeempresa").text("*Nome da empresa inválido");
        $("#msg_nomeempresa").css("color", "red");
        $("#nomeempresa").addClass("erro");
        a = false;
    }
    return a;
}


function cnpj() {
    if ($("#cnpj").hasClass("erro")) {
        $("#cnpj").removeClass("erro");
    } else if ($("#cnpj").hasClass("certo")) {
        $("#cnpj").removeClass("certo");
    }
    $("#cnpj").addClass("certo");
    var a = true;
    $("#msg_cnpj").text("");
    if ($("#cnpj").val().length < 14) {
        $("#msg_cnpj").text("*CNPJ inválido");
        $("#msg_cnpj").css("color", "red");
        $("#cnpj").addClass("erro");
        a = false;
    }
    return a;
}

function cnpjfisico() {
    if ($("#cnpj").hasClass("erro")) {
        $("#cnpj").removeClass("erro");
    } else if ($("#cnpj").hasClass("certo")) {
        $("#cnpj").removeClass("certo");
    }
    $("#cnpj").addClass("certo");
    var a = true;
    $("#msg_cnpj").text("");
    if ($("#cnpj").val() != "") {
        $("#msg_cnpj").text("*CNPJ inválido");
        $("#msg_cnpj").css("color", "red");
        $("#cnpj").addClass("erro");
        a = false;
    }
    return a;
}

function enderecoempresa() {
    if ($("#enderecoempresa").hasClass("erro")) {
        $("#enderecoempresa").removeClass("erro");
    } else if ($("#enderecoempresa").hasClass("certo")) {
        $("#enderecoempresa").removeClass("certo");
    }
    $("#enderecoempresa").addClass("certo");
    var a = true;
    $("#msg_enderecoempresa").text("");

    if ($("#enderecoempresa").val().trim() == "" || $("#enderecoempresa").val().trim().indexOf(" ") == -1) {
        $("#msg_enderecoempresa").text("*Endereço da empresa inválido");
        $("#msg_enderecoempresa").css("color", "red");
        $("#enderecoempresa").addClass("erro");
        a = false;
    }
    return a;
}

function enderecoempresafisico() {
    if ($("#enderecoempresa").hasClass("erro")) {
        $("#enderecoempresa").removeClass("erro");
    } else if ($("#enderecoempresa").hasClass("certo")) {
        $("#enderecoempresa").removeClass("certo");
    }
    $("#enderecoempresa").addClass("certo");
    var a = true;
    $("#msg_enderecoempresa").text("");

    if ($("#enderecoempresa").val() != "") {
        $("#msg_enderecoempresa").text("*Endereço da empresa inválido");
        $("#msg_enderecoempresa").css("color", "red");
        $("#enderecoempresa").addClass("erro");
        a = false;
    }
    return a;
}
