$(document).ready(function () {
    dcriacao();
})

function dcriacao() {
    var agora = new Date().toLocaleString()
    $("#datacriacao").val(agora);
    alert(agora);
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

    // var hv = $("#idvend").attr("value");
    //alert(hv);
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

    // var hv = $("#idvend").attr("value");
    //alert(hv);
}

function getidvei(idtd, nometd, placatd) {
    var id = idtd;
    var nome = nometd;
    var placa = placatd;

    $("#idvei").val(id);
    $("#placareadonly").val(placa);
    $("#veiculo").val(nome);

    $('#modalVeiculo').modal('hide');
    // var hv = $("#placareadonly").attr("value");
    // alert(hv);
}
