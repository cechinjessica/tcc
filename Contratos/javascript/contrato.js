$(document).ready(function () {

})



function getid(idtd, nometd, cpftd) {
    var id = idtd;
    var nome = nometd;
    var cpf = cpftd;
    $("#idvend").val(id);
    $("#cpfvreadonly").val(cpftd);
    $("#nomevreadonly").val(nometd);

    // var hv = $("#idvend").attr("value");
    //alert(hv);
}

function getidcomp(idtd, cpftd) {
    var id = idtd;
    var cpf = cpftd;
    $("#idcomp").val(id);
    $("#cpfcreadonly").val(cpftd);
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
