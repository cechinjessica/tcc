$(document).ready(function () {

})



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

    // var hv = $("#idvend").attr("value");
    //alert(hv);
}

function getidvei(idtd, placatd) {
    var id = idtd;
    var placa = placatd;
    $("#idvei").val(id);
    $("#placareadonly").val(placa);

    // var hv = $("#placareadonly").attr("value");
    // alert(hv);
}
