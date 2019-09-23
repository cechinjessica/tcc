$(document).ready(function () {
  //MASCARAS
  $("#ano").mask("0000");
  $("#modelo").mask("0000");
  $("#cor").mask("SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS");
  $("#valorvei").mask("#.##0,00", {
    reverse: true
  });
  $("#placa").mask("AAAA-AAAA", {
    reverse: true
  });

  $("#salvarveiculo").click(function (e) {
    if (!nome()) {
      e.preventDefault();
    }

    if (!marca()) {
      e.preventDefault();
    }
    if (!ano()) {
      e.preventDefault();
    }
    if (!modelo()) {
      e.preventDefault();
    }
    if (!chassi()) {
      e.preventDefault();
    }
    if (!cor()) {
      e.preventDefault();
    }
    if (!placa()) {
      e.preventDefault();
    }
    if (!renavam()) {
      e.preventDefault();
    }
    if (!proprietario()) {
      e.preventDefault();
    }
    if (!valor()) {
      e.preventDefault();
    }
    if (!estado()) {
      e.preventDefault();
    }
    if (!combustivel()) {
      e.preventDefault();
    }
  });
})

function nome() {
  if ($("#nomevei").hasClass("is-invalid")) {
    $("#nomevei").removeClass("is-invalid");
  } else if ($("#nomevei").hasClass("is-valid")) {
    $("#nomevei").removeClass("is-valid");
  }
  $("#nomevei").addClass("is-valid");
  var a = true;

  if ($("#nomevei").val().trim() == "") {
    $("#nomevei").addClass("is-invalid");
    a = false;
  }
  return a;
}

function marca() {
  if ($("#marca").hasClass("is-invalid")) {
    $("#marca").removeClass("is-invalid");
  } else if ($("#marca").hasClass("is-valid")) {
    $("#marca").removeClass("is-valid");
  }
  $("#marca").addClass("is-valid");
  var a = true;

  if ($("#marca").val().trim() == "") {
    $("#marca").addClass("is-invalid");
    a = false;
  }
  return a;
}


function ano() {
  if ($("#ano").hasClass("is-invalid")) {
    $("#ano").removeClass("is-invalid");
  } else if ($("#ano").hasClass("is-valid")) {
    $("#ano").removeClass("is-valid");
  }
  $("#ano").addClass("is-valid");
  var a = true;

  if ($("#ano").val() == "" || $("#ano").val().length > 4) {
    $("#ano").addClass("is-invalid");
    a = false;
  }
  return a;
}

function modelo() {
  if ($("#modelo").hasClass("is-invalid")) {
    $("#modelo").removeClass("is-invalid");
  } else if ($("#modelo").hasClass("is-valid")) {
    $("#modelo").removeClass("is-valid");
  }
  $("#modelo").addClass("is-valid");
  var a = true;

  var ano = parseInt($("#ano").val());
  var modelo = parseInt($("#modelo").val());

  if (modelo == "" || modelo.length > 4) {
    $("#modelo").addClass("is-invalid");
    return a = false;
  }
  if (!(modelo == ano - 1 | modelo == ano + 1 | modelo == ano)) {
    $("#modelo").addClass("is-invalid");
    a = false;
  }

  return a;
}

function chassi() {
  if ($("#chassi").hasClass("is-invalid")) {
    $("#chassi").removeClass("is-invalid");
  } else if ($("#chassi").hasClass("is-valid")) {
    $("#chassi").removeClass("is-valid");
  }
  $("#chassi").addClass("is-valid");
  var a = true;

  if ($("#chassi").val().trim() == "" || $("#chassi").val().length > 17) {
    $("#chassi").addClass("is-invalid");
    a = false;
  }
  return a;
}

function cor() {
  if ($("#cor").hasClass("is-invalid")) {
    $("#cor").removeClass("is-invalid");
  } else if ($("#cor").hasClass("is-valid")) {
    $("#cor").removeClass("is-valid");
  }
  $("#cor").addClass("is-valid");
  var a = true;

  if ($("#cor").val().trim() == "") {
    $("#cor").addClass("is-invalid");
    a = false;
  }
  return a;
}


function placa() {
  if ($("#placa").hasClass("is-invalid")) {
    $("#placa").removeClass("is-invalid");
  } else if ($("#placa").hasClass("is-valid")) {
    $("#placa").removeClass("is-valid");
  }
  $("#placa").addClass("is-valid");
  var a = true;

  if ($("#placa").val().trim() == "" || $("#placa").val().length > 8) {
    $("#placa").addClass("is-invalid");
    a = false;
  }
  return a;
}


function renavam() {
  if ($("#renavam").hasClass("is-invalid")) {
    $("#renavam").removeClass("is-invalid");
  } else if ($("#renavam").hasClass("is-valid")) {
    $("#renavam").removeClass("is-valid");
  }
  $("#renavam").addClass("is-valid");
  var a = true;

  if ($("#renavam").val().trim() == "" || $("#renavam").val().length > 11) {
    $("#renavam").addClass("is-invalid");
    a = false;
  }
  return a;
}


function proprietario() {
  if ($("#proprietario").hasClass("is-invalid")) {
    $("#proprietario").removeClass("is-invalid");
  } else if ($("#proprietario").hasClass("is-valid")) {
    $("#proprietario").removeClass("is-valid");
  }
  $("#proprietario").addClass("is-valid");
  var a = true;

  if ($("#proprietario").val().trim() == "" || $("#proprietario").val().trim().indexOf(" ") == -1) {
    $("#proprietario").addClass("is-invalid");
    a = false;
  }
  return a;
}

function valor() {
  if ($("#valorvei").hasClass("is-invalid")) {
    $("#valorvei").removeClass("is-invalid");
  } else if ($("#valorvei").hasClass("is-valid")) {
    $("#valorvei").removeClass("is-valid");
  }
  $("#valorvei").addClass("is-valid");
  var a = true;

  if ($("#valorvei").val().trim() == "") {
    $("#valorvei").addClass("is-invalid");
    a = false;
  }
  return a;
}

function estado() {
  if ($("input[name='estado']").hasClass("erro")) {
    $("input[name='estado']").removeClass("erro");
  } else if ($("input[name='estado']").hasClass("certo")) {
    $("input[name='estado']").removeClass("certo");
  }
  $("input[name='estado']").addClass("certo");
  var a = true;
  $("#msg_estado").text("");

  if (!$("input[name='estado']").is(':checked')) {
    $("#msg_estado").text("*Estado inválido");
    $("#msg_estado").css("color", "red");
    $("input[name='estado']").addClass("erro");
    a = false;
  }
  return a;
}

function combustivel() {
  if ($("input[name='combustivel']").hasClass("erro")) {
    $("input[name='combustivel']").removeClass("erro");
  } else if ($("input[name='combustivel']").hasClass("certo")) {
    $("input[name='combustivel']").removeClass("certo");
  }
  $("input[name='combustivel']").addClass("certo");
  var a = true;
  $("#msg_combustivel").text("");

  if (!$("input[name='combustivel']").is(':checked')) {
    $("#msg_combustivel").text("*Combustível inválido");
    $("#msg_combustivel").css("color", "red");
    $("input[name='combustivel']").addClass("erro");
    a = false;
  }
  return a;
}
