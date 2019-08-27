$(document).ready(function () {
    dcriacao();
    $("#salvarcontrato").click(function (e) {
        if (!vendedor()) {
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
