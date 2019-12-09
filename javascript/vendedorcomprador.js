$(document).ready(function () {
    //Quando o campo cep perde o foco.
    $("#cep").blur(function () {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if (validacep.test(cep)) {
                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#endereco").val(dados.logradouro + ", Bairro " + dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        $("#cep").val("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                $("#cep").val("Formato de CEP inválido.");
            }
        }
    });

    $("#cepempresa").blur(function () {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        $("#enderecoempresa").val(dados.logradouro + ", Bairro " + dados.bairro);
                        $("#cidadeempresa").val(dados.localidade);
                        $("#ufempresa").val(dados.uf);
                    } else {
                        $("#cepempresa").val("CEP não encontrado.");
                    }
                });
            } else {
                $("#cepempresa").val("Formato de CEP inválido.");
            }
        }
    });

    //MASCARAS
    $('#cnpj').mask('00.000.000/0000-00', {
        reverse: true
    });
    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });
    $("#rg").mask("0000000000");
    $("#cep").mask("00000-000");
    $("#cepempresa").mask("00000-000");
    $("#numero").mask("000000");
    $("#numeroempresa").mask("000000");
    $("#nacionalidade").mask("SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS");
    $("#uf").mask("SS");
    $("#ufempresa").mask("SS");


    $("#pessoaf").click(selecionarf);
    $("#pessoaj").click(selecionarj);
    $("#pessoaf").change(selecionarf);
    $("#pessoaj").change(selecionarj);
    if ($("#pessoaf").is(":checked")) {
        selecionarf();
    }
    if ($("#pessoaj").is(":checked")) {
        selecionarj();
    }


    $("#salvar").click(function (e) {
        if ($("#pessoaf").is(":checked")) {
            if (!pessoa()) {
                e.preventDefault();
            }
            if (!anome()) {
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
            if (!uf()) {
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
            if (!ufempresafisico()) {
                e.preventDefault();
            }
        } else if ($("#pessoaj").is(":checked")) {
            if (!pessoa()) {
                e.preventDefault();
            }
            if (!anome()) {
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
            if (!uf()) {
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
            if (!ufempresa()) {
                e.preventDefault();
            }
        } else {
            $("#msg_pessoa").text("*Selecione o tipo de pessoa");
            $("#msg_pessoa").css("color", "red");
            $("#pessoa").addClass("erro");
            e.preventDefault();
        }
    });

    $("#enviarpessoa").click(function (e) {
        if ($("#pessoaf").is(":checked")) {
            if (!pessoa()) {
                e.preventDefault();
            }
            if (!anome()) {
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
            if (!uf()) {
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
            if (!ufempresafisico()) {
                e.preventDefault();
            }
        } else if ($("#pessoaj").is(":checked")) {
            if (!pessoa()) {
                e.preventDefault();
            }
            if (!anome()) {
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
            if (!uf()) {
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
            if (!ufempresa()) {
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
    $("#gufempresa").css("display", "none");
    $("#gcepempresa").css("display", "none");


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
    $("#gufempresa").css("display", "inline");
    $("#gcepempresa").css("display", "inline");


}

function anome() {
    if ($("#nome").hasClass("is-invalid")) {
        $("#nome").removeClass("is-invalid");
    } else if ($("#nome").hasClass("is-valid")) {
        $("#nome").removeClass("is-valid");
    }
    $("#nome").addClass("is-valid");
    var a = true;

    if ($("#nome").val().trim() == "" || $("#nome").val().trim().indexOf(" ") == -1) {
        $("#nome").addClass("is-invalid");
        a = false;
    }
    return a;
}


function nacionalidade() {
    if ($("#nacionalidade").hasClass("is-invalid")) {
        $("#nacionalidade").removeClass("is-invalid");
    } else if ($("#nacionalidade").hasClass("is-valid")) {
        $("#nacionalidade").removeClass("is-valid");
    }
    $("#nacionalidade").addClass("is-valid");
    var a = true;

    if ($("#nacionalidade").val() == "") {
        $("#nacionalidade").addClass("is-invalid");
        a = false;
    }
    return a;
}

function profissao() {
    if ($("#profissao").hasClass("is-invalid")) {
        $("#profissao").removeClass("is-invalid");
    } else if ($("#profissao").hasClass("is-valid")) {
        $("#profissao").removeClass("is-valid");
    }
    $("#profissao").addClass("is-valid");
    var a = true;

    if ($("#profissao").val() == "") {
        $("#profissao").addClass("is-invalid");
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
    if ($("#rg").hasClass("is-invalid")) {
        $("#rg").removeClass("is-invalid");
    } else if ($("#rg").hasClass("is-valid")) {
        $("#rg").removeClass("is-valid");
    }
    $("#rg").addClass("is-valid");
    var a = true;

    if ($("#rg").val().length < 10) {
        $("#rg").addClass("is-invalid");
        a = false;
    }
    return a;
}

function cpf() {
    if ($("#cpf").hasClass("is-invalid")) {
        $("#cpf").removeClass("is-invalid");
    } else if ($("#cpf").hasClass("is-valid")) {
        $("#cpf").removeClass("is-valid");
    }
    $("#cpf").addClass("is-valid");
    var a = true;

    var cpf = $("#cpf").val();
    while (cpf.indexOf(".") != -1 || cpf.indexOf("-") != -1) {
        cpf = cpf.replace(".", "");
        cpf = cpf.replace("-", "");
    }

    if (cpf.length != 11 || isNaN(cpf)) {
        $("#cpf").addClass("is-invalid");
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
            $("#cpf").addClass("is-invalid");
            a = false;
            return false;
        }

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

        if (k != cpfA[10]) {
            $("#cpf").addClass("is-invalid");
            a = false;
            return false;
        }
    }
    return a;

}

function endereco() {
    if ($("#endereco").hasClass("is-invalid")) {
        $("#endereco").removeClass("is-invalid");
    } else if ($("#endereco").hasClass("is-valid")) {
        $("#endereco").removeClass("is-valid");
    }
    $("#endereco").addClass("is-valid");
    var a = true;

    if ($("#endereco").val().trim() == "" || $("#endereco").val().trim().indexOf(" ") == -1) {
        $("#endereco").addClass("is-invalid");
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
    if ($("#numero").hasClass("is-invalid")) {
        $("#numero").removeClass("is-invalid");
    } else if ($("#numero").hasClass("is-valid")) {
        $("#numero").removeClass("is-valid");
    }
    $("#numero").addClass("is-valid");
    var a = true;

    if ($("#numero").val().trim() == "") {
        $("#numero").addClass("is-invalid");
        a = false;
    }
    return a;
}

function cidade() {
    if ($("#cidade").hasClass("is-invalid")) {
        $("#cidade").removeClass("is-invalid");
    } else if ($("#cidade").hasClass("is-valid")) {
        $("#cidade").removeClass("is-valid");
    }
    $("#cidade").addClass("is-valid");
    var a = true;

    if ($("#cidade").val().trim() == "") {
        $("#cidade").addClass("is-invalid");
        a = false;
    }
    return a;
}

function cep() {
    if ($("#cep").hasClass("is-invalid")) {
        $("#cep").removeClass("is-invalid");
    } else if ($("#cep").hasClass("is-valid")) {
        $("#cep").removeClass("is-valid");
    }
    $("#cep").addClass("is-valid");
    var a = true;

    if ($("#cep").val() < 8) {
        $("#cep").addClass("is-invalid");
        a = false;
    }
    return a;
}

function sexo() {
    if ($("input[name='sexo'][type='radio']").hasClass("erro")) {
        $("input[name='sexo'][type='radio']").removeClass("erro");
    } else if ($("input[name='sexo'][type='radio']").hasClass("certo")) {
        $("input[name='sexo'][type='radio']").removeClass("certo");
    }
    $("input[name='sexo'][type='radio']").addClass("certo");
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
    if ($("#nomeempresa").hasClass("is-invalid")) {
        $("#nomeempresa").removeClass("is-invalid");
    } else if ($("#nomeempresa").hasClass("is-valid")) {
        $("#nomeempresa").removeClass("is-valid");
    }
    $("#nomeempresa").addClass("is-valid");
    var a = true;

    if ($("#nomeempresa").val().trim() == "" || $("#nomeempresa").val().trim().indexOf(" ") == -1) {
        $("#nomeempresa").addClass("is-invalid");
        a = false;
    }
    return a;
}

function nomeempresafisico() {
    if ($("#nomeempresa").hasClass("is-invalid")) {
        $("#nomeempresa").removeClass("is-invalid");
    } else if ($("#nomeempresa").hasClass("is-valid")) {
        $("#nomeempresa").removeClass("is-valid");
    }
    $("#nomeempresa").addClass("is-valid");
    var a = true;

    return a;
}


function cnpj() {
    if ($("#cnpj").hasClass("is-invalid")) {
        $("#cnpj").removeClass("is-invalid");
    } else if ($("#cnpj").hasClass("is-valid")) {
        $("#cnpj").removeClass("is-valid");
    }
    $("#cnpj").addClass("is-valid");
    var a = true;

    if ($("#cnpj").val().length < 14) {
        $("#cnpj").addClass("is-invalid");
        a = false;
    }
    return a;
}

function cnpjfisico() {
    if ($("#cnpj").hasClass("is-invalid")) {
        $("#cnpj").removeClass("is-invalid");
    } else if ($("#cnpj").hasClass("is-valid")) {
        $("#cnpj").removeClass("is-valid");
    }
    $("#cnpj").addClass("is-valid");
    var a = true;

    return a;
}

function enderecoempresa() {
    if ($("#enderecoempresa").hasClass("is-invalid")) {
        $("#enderecoempresa").removeClass("is-invalid");
    } else if ($("#enderecoempresa").hasClass("is-valid")) {
        $("#enderecoempresa").removeClass("is-valid");
    }
    $("#enderecoempresa").addClass("is-valid");
    var a = true;

    if ($("#enderecoempresa").val().trim() == "" || $("#enderecoempresa").val().trim().indexOf(" ") == -1) {
        $("#enderecoempresa").addClass("is-invalid");
        a = false;
    }
    return a;
}

function enderecoempresafisico() {
    if ($("#enderecoempresa").hasClass("is-invalid")) {
        $("#enderecoempresa").removeClass("is-invalid");
    } else if ($("#enderecoempresa").hasClass("is-valid")) {
        $("#enderecoempresa").removeClass("is-valid");
    }
    $("#enderecoempresa").addClass("is-valid");
    var a = true;

    return a;
}

function cargoempresa() {
    if ($("#cargoempresa").hasClass("is-invalid")) {
        $("#cargoempresa").removeClass("is-invalid");
    } else if ($("#cargoempresa").hasClass("is-valid")) {
        $("#cargoempresa").removeClass("is-valid");
    }
    $("#cargoempresa").addClass("is-valid");
    var a = true;

    var cargoempresa = $("#cargoempresa").val();
    if ($("#cargoempresa") == undefined) {
        cargoempresa = "";
    } else {
        cargoempresa = $("#cargoempresa").val();
    }

    if (cargoempresa.trim() == "") {
        $("#cargoempresa").addClass("is-invalid");
        a = false;
    }
    return a;
}

function cargoempresafisico() {
    if ($("#cargoempresa").hasClass("is-invalid")) {
        $("#cargoempresa").removeClass("is-invalid");
    } else if ($("#cargoempresa").hasClass("is-valid")) {
        $("#cargoempresa").removeClass("is-valid");
    }
    $("#cargoempresa").addClass("is-valid");
    var a = true;

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

    return a;
}

function cidadeempresa() {
    if ($("#cidadeempresa").hasClass("is-invalid")) {
        $("#cidadeempresa").removeClass("is-invalid");
    } else if ($("#cidadeempresa").hasClass("is-valid")) {
        $("#cidadeempresa").removeClass("is-valid");
    }
    $("#cidadeempresa").addClass("is-valid");
    var a = true;

    if ($("#cidadeempresa").val().trim() == "") {
        $("#cidadeempresa").addClass("is-invalid");
        a = false;
    }
    return a;
}

function cidadeempresafisico() {
    if ($("#cidadeempresa").hasClass("is-invalid")) {
        $("#cidadeempresa").removeClass("is-invalid");
    } else if ($("#cidadeempresa").hasClass("is-valid")) {
        $("#cidadeempresa").removeClass("is-valid");
    }
    $("#cidadeempresa").addClass("is-valid");
    var a = true;

    return a;
}

function numeroempresa() {
    if ($("#numeroempresa").hasClass("is-invalid")) {
        $("#numeroempresa").removeClass("is-invalid");
    } else if ($("#numeroempresa").hasClass("is-valid")) {
        $("#numeroempresa").removeClass("is-valid");
    }
    $("#numeroempresa").addClass("is-valid");
    var a = true;

    if ($("#numeroempresa").val().trim() == "") {
        $("#numeroempresa").addClass("is-invalid");
        a = false;
    }
    return a;
}

function numeroempresafisico() {
    if ($("#numeroempresa").hasClass("is-invalid")) {
        $("#numeroempresa").removeClass("is-invalid");
    } else if ($("#numeroempresa").hasClass("is-valid")) {
        $("#numeroempresa").removeClass("is-valid");
    }
    $("#numeroempresa").addClass("is-valid");
    var a = true;

    return a;
}

function ufempresa() {
    if ($("#ufempresa").hasClass("is-invalid")) {
        $("#ufempresa").removeClass("is-invalid");
    } else if ($("#ufempresa").hasClass("is-valid")) {
        $("#ufempresa").removeClass("is-valid");
    }
    $("#ufempresa").addClass("is-valid");
    var a = true;

    if ($("#ufempresa").val().length != 2) {
        $("#ufempresa").addClass("is-invalid");
        a = false;
    }
    return a;
}

function ufempresafisico() {
    if ($("#ufempresa").hasClass("is-invalid")) {
        $("#ufempresa").removeClass("is-invalid");
    } else if ($("#ufempresa").hasClass("is-valid")) {
        $("#ufempresa").removeClass("is-valid");
    }
    $("#ufempresa").addClass("is-valid");
    var a = true;

    return a;
}

function uf() {
    if ($("#uf").hasClass("is-invalid")) {
        $("#uf").removeClass("is-invalid");
    } else if ($("#uf").hasClass("is-valid")) {
        $("#uf").removeClass("is-valid");
    }
    $("#uf").addClass("is-valid");
    var a = true;

    if ($("#uf").val().length != 2) {
        $("#uf").addClass("is-invalid");
        a = false;
    }
    return a;
}

function uffisico() {
    if ($("#uf").hasClass("is-invalid")) {
        $("#uf").removeClass("is-invalid");
    } else if ($("#uf").hasClass("is-valid")) {
        $("#uf").removeClass("is-valid");
    }
    $("#uf").addClass("is-valid");
    var a = true;

    return a;
}
