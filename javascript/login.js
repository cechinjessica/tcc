$(document).ready(function () {
    $("#logar").click(function (e) {
        if (!login()) {
            e.preventDefault();
        }
        if (!senha()) {
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
