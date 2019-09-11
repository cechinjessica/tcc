$(document).ready(function () {
    $("#redefinir").click(function (e) {
        if (!login()) {
            e.preventDefault();
        }
        if (!senha()) {
            e.preventDefault();
        }
        if (!nsenha()) {
            e.preventDefault();
        }

    });

})

function login() {
    if ($("#usuario").hasClass("is-invalid")) {
        $("#usuario").removeClass("is-invalid");
    } else if ($("#usuario").hasClass("is-valid")) {
        $("#usuario").removeClass("is-valid");
    }

    $("#usuario").addClass("is-valid");
    var a = true;

    if ($("#usuario").val() == "") {
        $("#usuario").addClass("is-invalid");
        a = false;
    }
    return a;
}

function senha() {
    if ($("#senha").hasClass("is-invalid")) {
        $("#senha").removeClass("is-invalid");
    } else if ($("#senha").hasClass("is-valid")) {
        $("#senha").removeClass("is-valid");
    }
    $("#senha").addClass("is-valid");
    var a = true;

    if ($("#senha").val().length < 6) {
        $("#senha").addClass("is-invalid");
        a = false;
    }
    return a;
}

function nsenha() {
    if ($("#nsenha").hasClass("is-invalid")) {
        $("#nsenha").removeClass("is-invalid");
    } else if ($("#nsenha").hasClass("is-valid")) {
        $("#nsenha").removeClass("is-valid");
    }
    $("#nsenha").addClass("is-valid");
    var a = true;

    if ($("#nsenha").val().length < 6) {
        $("#nsenha").addClass("is-invalid");
        a = false;
    }
    return a;
}
