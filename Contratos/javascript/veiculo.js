$(document).ready(function () {
    //MASCARAS
    $("#cnpj").mask("00.000.000/0000-00");
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("0000000000");
    $("#cep").mask("00000-000");
    $("#numero").mask("000000");
    $("#numeroempresa").mask("000000");


    $("#pessoaf").click(selecionarf);
    $("#pessoaj").click(selecionarj);
    $("#pessoaf").change(selecionarf);
    $("#pessoaj").change(selecionarj);
    if ($("#pessoaf").is(":checked")) {
        selecionarf;
    }
    if ($("#pessoaj").is(":checked")) {
        selecionarj;
    }


    $("#salvar").click(function (e) {
        if ($("#pessoaf").is(":checked")) {
            if (!pessoa()) {
                e.preventDefault();
            }
            if (!nome()) {
                e.preventDefault();
            }
            if (!nacionalidade()) {
                e.preventDefault();
            }
            if (!profissao()) {
                e.preventDefault();
            }
            if (!estadocivil()) {
                e.preventDefault();
            }
            if (!rg()) {
                e.preventDefault();
            }
            if (!cpf()) {
                e.preventDefault();
            }
            if (!endereco()) {
                e.preventDefault();
            }
            if (!numero()) {
                e.preventDefault();
            }
            if (!cidade()) {
                e.preventDefault();
            }
            if (!cep()) {
                e.preventDefault();
            }
            if (!sexo()) {
                e.preventDefault();
            }

            if (!nomeempresafisico()) {
                e.preventDefault();
            }
            if (!cnpjfisico()) {
                e.preventDefault();
            }
            if (!enderecoempresafisico()) {
                e.preventDefault();
            }
            if (!cargoempresafisico()) {
                e.preventDefault();
            }
            if (!tipoempresafisico()) {
                e.preventDefault();
            }
            if (!cidadeempresafisico()) {
                e.preventDefault();
            }
            if (!numeroempresafisico()) {
                e.preventDefault();
            }
        } else if ($("#pessoaj").is(":checked")) {
            if (!pessoa()) {
                e.preventDefault();
            }
            if (!nome()) {
                e.preventDefault();
            }
            if (!nacionalidade()) {
                e.preventDefault();
            }
            if (!profissao()) {
                e.preventDefault();
            }
            if (!estadocivil()) {
                e.preventDefault();
            }
            if (!rg()) {
                e.preventDefault();
            }
            if (!cpf()) {
                e.preventDefault();
            }
            if (!endereco()) {
                e.preventDefault();
            }
            if (!numero()) {
                e.preventDefault();
            }
            if (!cidade()) {
                e.preventDefault();
            }
            if (!cep()) {
                e.preventDefault();
            }
            if (!sexo()) {
                e.preventDefault();
            }
            if (!nomeempresa()) {
                e.preventDefault();
            }
            if (!cnpj()) {
                e.preventDefault();
            }
            if (!enderecoempresa()) {
                e.preventDefault();
            }
            if (!cargoempresa()) {
                e.preventDefault();
            }
            if (!tipoempresa()) {
                e.preventDefault();
            }
            if (!cidadeempresa()) {
                e.preventDefault();
            }
            if (!numeroempresa()) {
                e.preventDefault();
            }
        } else {
            $("#msg_pessoa").text("*Selecione o tipo de pessoa");
            $("#msg_pessoa").css("color", "red");
            $("#pessoa").addClass("erro");
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
    if ($("#nome").hasClass("erro")) {
        $("#nome").removeClass("erro");
    } else if ($("#nome").hasClass("certo")) {
        $("#nome").removeClass("certo");
    }
    $("#nome").addClass("certo");
    var a = true;
    $("#msg_nome").text("");

    if ($("#nome").val().trim() == "" || $("#nome").val().trim().indexOf(" ") == -1) {
        $("#msg_nome").text("*Nome inválido");
        $("#msg_nome").css("color", "red");
        $("#nome").addClass("erro");
        a = false;
    }
    return a;
}

function nacionalidade() {
    if ($("#nacionalidade").hasClass("erro")) {
        $("#nacionalidade").removeClass("erro");
    } else if ($("#nacionalidade").hasClass("certo")) {
        $("#nacionalidade").removeClass("certo");
    }
    $("#nacionalidade").addClass("certo");
    var a = true;
    $("#msg_nacionalidade").text("");

    if ($("#nacionalidade").val() == "") {
        $("#msg_nacionalidade").text("*Nacionalidade inválida");
        $("#msg_nacionalidade").css("color", "red");
        $("#nacionalidade").addClass("erro");
        a = false;
    }
    return a;
}

function profissao() {
    if ($("#profissao").hasClass("erro")) {
        $("#profissao").removeClass("erro");
    } else if ($("#profissao").hasClass("certo")) {
        $("#profissao").removeClass("certo");
    }
    $("#profissao").addClass("certo");
    var a = true;
    $("#msg_profissao").text("");

    if ($("#profissao").val() == "") {
        $("#msg_profissao").text("*Profissão inválida");
        $("#msg_profissao").css("color", "red");
        $("#profissao").addClass("erro");
        a = false;
    }
    return a;
}

function estadocivil() {
    if ($("input[name='ecivil']").hasClass("erro")) {
        $("input[name='ecivil']").removeClass("erro");
    } else if ($("input[name='ecivil']").hasClass("certo")) {
        $("input[name='ecivil']").removeClass("certo");
    }
    $("input[name='ecivil']").addClass("certo");
    var a = true;
    $("#msg_ecivil").text("");

    if (!$("input[name='ecivil']").is(':checked')) {
        $("#msg_ecivil").text("*Estado cívil inválido");
        $("#msg_ecivil").css("color", "red");
        $("input[name='ecivil']").addClass("erro");
        a = false;
    }
    return a;
}

function rg() {
    if ($("#rg").hasClass("erro")) {
        $("#rg").removeClass("erro");
    } else if ($("#rg").hasClass("certo")) {
        $("#rg").removeClass("certo");
    }
    $("#rg").addClass("certo");
    var a = true;
    $("#msg_rg").text("");

    if ($("#rg").val().length < 10) {
        $("#msg_rg").text("*RG inválido");
        $("#msg_rg").css("color", "red");
        $("#rg").addClass("erro");
        a = false;
    }
    return a;
}

function cpf() {
    if ($("#cpf").hasClass("erro")) {
        $("#cpf").removeClass("erro");
    } else if ($("#cpf").hasClass("certo")) {
        $("#cpf").removeClass("certo");
    }
    $("#cpf").addClass("certo");
    var a = true;
    $("#msg_cpf").text("");

    var cpf = $("#cpf").val();
    while (cpf.indexOf(".") != -1 || cpf.indexOf("-") != -1) {
        cpf = cpf.replace(".", "");
        cpf = cpf.replace("-", "");
    }

    if (cpf.length != 11 || isNaN(cpf)) {
        $("#msg_cpf").text("*CPF inválido");
        $("#msg_cpf").css("color", "red");
        $("#cpf").addClass("erro");
        a = false;
    } else {

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
            $("#msg_cpf").text("*CPF inválido");
            $("#msg_cpf").css("color", "red");
            $("#cpf").addClass("erro");
            a = false;
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
            $("#msg_cpf").text("*CPF inválido");
            $("#msg_cpf").css("color", "red");
            $("#cpf").addClass("erro");
            a = false;
            return false;
        }
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

function cargoempresa() {
    if ($("#cargoempresa").hasClass("erro")) {
        $("#cargoempresa").removeClass("erro");
    } else if ($("#cargoempresa").hasClass("certo")) {
        $("#cargoempresa").removeClass("certo");
    }
    $("#cargoempresa").addClass("certo");
    var a = true;
    $("#msg_cargoempresa").text("");

    var cargoempresa = $("#cargoempresa").val();
    if ($("#cargoempresa") == undefined) {
        cargoempresa = "";
    } else {
        cargoempresa = $("#cargoempresa").val();
    }

    if (cargoempresa.trim() == "") {
        $("#msg_cargoempresa").text("*Cargo da empresa inválido");
        $("#msg_cargoempresa").css("color", "red");
        $("#cargoempresa").addClass("erro");
        a = false;
    }
    return a;
}

function cargoempresafisico() {
    if ($("#cargoempresa").hasClass("erro")) {
        $("#cargoempresa").removeClass("erro");
    } else if ($("#cargoempresa").hasClass("certo")) {
        $("#cargoempresa").removeClass("certo");
    }
    $("#cargoempresa").addClass("certo");
    var a = true;
    $("#msg_cargoempresa").text("");

    if ($("#cargoempresa").val() != "") {
        $("#msg_cargoempresa").text("*Cargo da empresa inválido");
        $("#msg_cargoempresa").css("color", "red");
        $("#cargoempresa").addClass("erro");
        a = false;
    }
    return a;
}

function tipoempresa() {
    if ($("#input[name='tipoempresa']").hasClass("erro")) {
        $("#input[name='tipoempresa']").removeClass("erro");
    } else if ($("#input[name='tipoempresa']").hasClass("certo")) {
        $("#input[name='tipoempresa']").removeClass("certo");
    }
    $("#input[name='tipoempresa']").addClass("certo");
    var a = true;
    $("#msg_tipoempresa").text("");

    if (!$("input[type='radio'][name='tipoempresa']").is(':checked')) {
        $("#msg_tipoempresa").text("*Tipo da empresa inválido");
        $("#msg_tipoempresa").css("color", "red");
        $("#input[name='tipoempresa']").addClass("erro");
        a = false;
    }
    return a;
}

function tipoempresafisico() {
    if ($("#input[name='tipoempresa']").hasClass("erro")) {
        $("#input[name='tipoempresa']").removeClass("erro");
    } else if ($("#input[name='tipoempresa']").hasClass("certo")) {
        $("#input[name='tipoempresa']").removeClass("certo");
    }
    $("#input[name='tipoempresa']").addClass("certo");
    var a = true;
    $("#msg_tipoempresa").text("");

    if ($("input[type='radio'][name='tipoempresa']").is(':checked')) {
        $("#msg_tipoempresa").text("*Tipo da empresa inválido");
        $("#msg_tipoempresa").css("color", "red");
        $("#input[name='tipoempresa']").addClass("erro");
        a = false;
    }
    return a;
}

function cidadeempresa() {
    if ($("#cidadeempresa").hasClass("erro")) {
        $("#cidadeempresa").removeClass("erro");
    } else if ($("#cidadeempresa").hasClass("certo")) {
        $("#cidadeempresa").removeClass("certo");
    }
    $("#cidadeempresa").addClass("certo");
    var a = true;
    $("#msg_cidadeempresa").text("");

    if ($("#cidadeempresa").val().trim() == "") {
        $("#msg_cidadeempresa").text("*Cidade da empresa inválido");
        $("#msg_cidadeempresa").css("color", "red");
        $("#cidadeempresa").addClass("erro");
        a = false;
    }
    return a;
}

function cidadeempresafisico() {
    if ($("#cidadeempresa").hasClass("erro")) {
        $("#cidadeempresa").removeClass("erro");
    } else if ($("#cidadeempresa").hasClass("certo")) {
        $("#cidadeempresa").removeClass("certo");
    }
    $("#cidadeempresa").addClass("certo");
    var a = true;
    $("#msg_cidadeempresa").text("");

    if ($("#cidadeempresa").val().trim() != "") {
        $("#msg_cidadeempresa").text("*Cidade da empresa inválido");
        $("#msg_cidadeempresa").css("color", "red");
        $("#cidadeempresa").addClass("erro");
        a = false;
    }
}

function numeroempresa() {
    if ($("#numeroempresa").hasClass("erro")) {
        $("#numeroempresa").removeClass("erro");
    } else if ($("#numeroempresa").hasClass("certo")) {
        $("#numeroempresa").removeClass("certo");
    }
    $("#numeroempresa").addClass("certo");
    var a = true;
    $("#msg_numeroempresa").text("");

    if ($("#numeroempresa").val().trim() == "") {
        $("#msg_numeroempresa").text("*Número da empresa inválido");
        $("#msg_numeroempresa").css("color", "red");
        $("#numeroempresa").addClass("erro");
        a = false;
    }
    return a;
}

function numeroempresafisico() {
    if ($("#numeroempresa").hasClass("erro")) {
        $("#numeroempresa").removeClass("erro");
    } else if ($("#numeroempresa").hasClass("certo")) {
        $("#numeroempresa").removeClass("certo");
    }
    $("#numeroempresa").addClass("certo");
    var a = true;
    $("#msg_numeroempresa").text("");

    if ($("#numeroempresa").val() != "") {
        $("#msg_numeroempresa").text("*Número da empresa inválido");
        $("#msg_numeroempresa").css("color", "red");
        $("#numeroempresa").addClass("erro");
        a = false;
    }
    return a;
}
