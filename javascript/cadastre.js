$(document).ready(function () {
    $("#cadastre").click(function (e) {
        if (!login()) {
            e.preventDefault();
        }
        if (!senha()) {
            e.preventDefault();
        }
        if (!nome()) {
            e.preventDefault();
        }
        if (!email()) {
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


function nome() {
    if ($("#nome").hasClass("is-invalid")) {
        $("#nome").removeClass("is-invalid");
    } else if ($("#nome").hasClass("is-valid")) {
        $("#nome").removeClass("is-valid");
    }

    $("#nome").addClass("is-valid");
    var a = true;

    if ($("#nome").val() == "") {
        $("#nome").addClass("is-invalid");
        a = false;
    }
    return a;
}

function email() {
    if ($("#email").hasClass("is-invalid")) {
        $("#email").removeClass("is-invalid");
    } else if ($("#email").hasClass("is-valid")) {
        $("#email").removeClass("is-valid");
    }

    $("#email").addClass("is-valid");
    var a = true;

    if ($("#email").val() == "") {
        $("#email").addClass("is-invalid");
        a = false;
    }
    return a;
}
