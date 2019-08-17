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

function getidcomp(idtd, nometd, cpftd) {
    var id = idtd;
    var nome = nometd;
    var cpf = cpftd;
    $("#idcomp").val(id);
    $("#cpfcreadonly").val(cpftd);
    $("#nomecreadonly").val(nometd);

    // var hv = $("#idvend").attr("value");
    //alert(hv);
}
